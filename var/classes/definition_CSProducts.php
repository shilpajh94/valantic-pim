<?php 

/** 
* Generated at: 2021-10-25T09:12:55+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- Name [input]
- CorporateBrand [input]
- ProductBrand [input]
- ProductOwner [user]
- isPaused [checkbox]
- isArchived [checkbox]
- NatureOfProduct [input]
- CSSegment [multiselect]
- CSRegion [multiselect]
- Benefits [input]
- Features [input]
- ProductClaimSlogan [input]
- SelectCountries [countrymultiselect]
- CSPerformanceCategory [multiselect]
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
   'modificationDate' => 1635145974,
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
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          4 => 
                          array (
                            'value' => 36,
                            'key' => 'a352850 (Reji Joseph)',
                          ),
                          5 => 
                          array (
                            'value' => 55,
                            'key' => 'a389752 (Randy Kish)',
                          ),
                          6 => 
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
                          7 => 
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
                          8 => 
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
                          9 => 
                          array (
                            'value' => 71,
                            'key' => 'boulakhrifa (Abdelhakim Boulakhrif)',
                          ),
                          10 => 
                          array (
                            'value' => 61,
                            'key' => 'C012194 (Mackenzie Brown)',
                          ),
                          11 => 
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
                          ),
                          12 => 
                          array (
                            'value' => 21,
                            'key' => 'Dave (Dave Smith)',
                          ),
                          13 => 
                          array (
                            'value' => 42,
                            'key' => 'dobol (Laszlo Dobo)',
                          ),
                          14 => 
                          array (
                            'value' => 33,
                            'key' => 'editor',
                          ),
                          15 => 
                          array (
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
                          16 => 
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
                          17 => 
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
                          18 => 
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
                          19 => 
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
                          20 => 
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
                          21 => 
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
                          22 => 
                          array (
                            'value' => 77,
                            'key' => 'lohrbergj (Joerg Lohrberg)',
                          ),
                          23 => 
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
                          24 => 
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
                          25 => 
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
                          26 => 
                          array (
                            'value' => 81,
                            'key' => 'menzelm (Marisa Menzel)',
                          ),
                          27 => 
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
                          28 => 
                          array (
                            'value' => 75,
                            'key' => 'neuenrothc (Christian Neuenroth)',
                          ),
                          29 => 
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
                          30 => 
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
                          31 => 
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
                          32 => 
                          array (
                            'value' => 79,
                            'key' => 'posseltc (Christof Posselt)',
                          ),
                          33 => 
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
                          34 => 
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
                          35 => 
                          array (
                            'value' => 62,
                            'key' => 'rajputa (Amit Rajput)',
                          ),
                          36 => 
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
                          37 => 
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
                          38 => 
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
                          39 => 
                          array (
                            'value' => 67,
                            'key' => 'schickedanzm (Malte Schickedanz)',
                          ),
                          40 => 
                          array (
                            'value' => 70,
                            'key' => 'steinerd (Daniel Steiner)',
                          ),
                          41 => 
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
                          42 => 
                          array (
                            'value' => 66,
                            'key' => 'uia60821 (Vandana Singal)',
                          ),
                          43 => 
                          array (
                            'value' => 74,
                            'key' => 'uia60823 (Rony Felix)',
                          ),
                          44 => 
                          array (
                            'value' => 68,
                            'key' => 'uia89654 (Kinsey Hastings)',
                          ),
                          45 => 
                          array (
                            'value' => 78,
                            'key' => 'uib09594 (Lars Tiedje)',
                          ),
                          46 => 
                          array (
                            'value' => 64,
                            'key' => 'uib68208 (Krishan Kumar)',
                          ),
                          47 => 
                          array (
                            'value' => 65,
                            'key' => 'uib68209 (Siddharth Chaudhery)',
                          ),
                          48 => 
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Toks Ajepe)',
                          ),
                          49 => 
                          array (
                            'value' => 72,
                            'key' => 'uic39540 (Cedric Schulz)',
                          ),
                          50 => 
                          array (
                            'value' => 69,
                            'key' => 'uic52020 (Oktay Oezcan)',
                          ),
                          51 => 
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
                          52 => 
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
                          53 => 
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
                          54 => 
                          array (
                            'value' => 80,
                            'key' => 'uie42653 (DANIELA ALBUQUERQUE)',
                          ),
                          55 => 
                          array (
                            'value' => 76,
                            'key' => 'UIE43370 (Noah Hartman)',
                          ),
                          56 => 
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
                          57 => 
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
                          58 => 
                          array (
                            'value' => 60,
                            'key' => 'v000886 (Flint Wilson)',
                          ),
                          59 => 
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
                          60 => 
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
                          61 => 
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
                          62 => 
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
                          63 => 
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
                          64 => 
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
                          65 => 
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
                          66 => 
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
                          67 => 
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
                          68 => 
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
                          69 => 
                          array (
                            'value' => 73,
                            'key' => 'za02860 (Chad Peters)',
                          ),
                          70 => 
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'AMERICAS',
                            'value' => 7883985,
                          ),
                          1 => 
                          array (
                            'key' => 'APAC',
                            'value' => 7883984,
                          ),
                          2 => 
                          array (
                            'key' => 'EMEA',
                            'value' => 7883983,
                          ),
                          3 => 
                          array (
                            'key' => 'SERVICE',
                            'value' => 7883986,
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
                         'locked' => NULL,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      8 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Australia / South Pacific',
                            'value' => 7883980,
                          ),
                          1 => 
                          array (
                            'key' => 'China & Mongolia',
                            'value' => 7883978,
                          ),
                          2 => 
                          array (
                            'key' => 'Eastern Europe/Russia',
                            'value' => 7883975,
                          ),
                          3 => 
                          array (
                            'key' => 'India',
                            'value' => 7883979,
                          ),
                          4 => 
                          array (
                            'key' => 'Middle East/North Africa',
                            'value' => 7883976,
                          ),
                          5 => 
                          array (
                            'key' => 'North America',
                            'value' => 7883972,
                          ),
                          6 => 
                          array (
                            'key' => 'South America',
                            'value' => 7883973,
                          ),
                          7 => 
                          array (
                            'key' => 'South East Asia',
                            'value' => 7883981,
                          ),
                          8 => 
                          array (
                            'key' => 'Subsahara/South Africa',
                            'value' => 7883977,
                          ),
                          9 => 
                          array (
                            'key' => 'Western Europe',
                            'value' => 7883974,
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
                            'key' => 'Ascension Island',
                            'value' => 'AC',
                          ),
                          13 => 
                          array (
                            'key' => 'Australia',
                            'value' => 'AU',
                          ),
                          14 => 
                          array (
                            'key' => 'Austria',
                            'value' => 'AT',
                          ),
                          15 => 
                          array (
                            'key' => 'Azerbaijan',
                            'value' => 'AZ',
                          ),
                          16 => 
                          array (
                            'key' => 'Bahamas',
                            'value' => 'BS',
                          ),
                          17 => 
                          array (
                            'key' => 'Bahrain',
                            'value' => 'BH',
                          ),
                          18 => 
                          array (
                            'key' => 'Bangladesh',
                            'value' => 'BD',
                          ),
                          19 => 
                          array (
                            'key' => 'Barbados',
                            'value' => 'BB',
                          ),
                          20 => 
                          array (
                            'key' => 'Belarus',
                            'value' => 'BY',
                          ),
                          21 => 
                          array (
                            'key' => 'Belgium',
                            'value' => 'BE',
                          ),
                          22 => 
                          array (
                            'key' => 'Belize',
                            'value' => 'BZ',
                          ),
                          23 => 
                          array (
                            'key' => 'Benin',
                            'value' => 'BJ',
                          ),
                          24 => 
                          array (
                            'key' => 'Bermuda',
                            'value' => 'BM',
                          ),
                          25 => 
                          array (
                            'key' => 'Bhutan',
                            'value' => 'BT',
                          ),
                          26 => 
                          array (
                            'key' => 'Bolivia',
                            'value' => 'BO',
                          ),
                          27 => 
                          array (
                            'key' => 'Bosnia & Herzegovina',
                            'value' => 'BA',
                          ),
                          28 => 
                          array (
                            'key' => 'Botswana',
                            'value' => 'BW',
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
                            'key' => 'Canary Islands',
                            'value' => 'IC',
                          ),
                          40 => 
                          array (
                            'key' => 'Cape Verde',
                            'value' => 'CV',
                          ),
                          41 => 
                          array (
                            'key' => 'Caribbean Netherlands',
                            'value' => 'BQ',
                          ),
                          42 => 
                          array (
                            'key' => 'Cayman Islands',
                            'value' => 'KY',
                          ),
                          43 => 
                          array (
                            'key' => 'Central African Republic',
                            'value' => 'CF',
                          ),
                          44 => 
                          array (
                            'key' => 'Ceuta & Melilla',
                            'value' => 'EA',
                          ),
                          45 => 
                          array (
                            'key' => 'Chad',
                            'value' => 'TD',
                          ),
                          46 => 
                          array (
                            'key' => 'Chile',
                            'value' => 'CL',
                          ),
                          47 => 
                          array (
                            'key' => 'China',
                            'value' => 'CN',
                          ),
                          48 => 
                          array (
                            'key' => 'Christmas Island',
                            'value' => 'CX',
                          ),
                          49 => 
                          array (
                            'key' => 'Cocos (Keeling) Islands',
                            'value' => 'CC',
                          ),
                          50 => 
                          array (
                            'key' => 'Colombia',
                            'value' => 'CO',
                          ),
                          51 => 
                          array (
                            'key' => 'Comoros',
                            'value' => 'KM',
                          ),
                          52 => 
                          array (
                            'key' => 'Congo - Brazzaville',
                            'value' => 'CG',
                          ),
                          53 => 
                          array (
                            'key' => 'Congo - Kinshasa',
                            'value' => 'CD',
                          ),
                          54 => 
                          array (
                            'key' => 'Cook Islands',
                            'value' => 'CK',
                          ),
                          55 => 
                          array (
                            'key' => 'Costa Rica',
                            'value' => 'CR',
                          ),
                          56 => 
                          array (
                            'key' => 'Croatia',
                            'value' => 'HR',
                          ),
                          57 => 
                          array (
                            'key' => 'Cuba',
                            'value' => 'CU',
                          ),
                          58 => 
                          array (
                            'key' => 'Curaçao',
                            'value' => 'CW',
                          ),
                          59 => 
                          array (
                            'key' => 'Cyprus',
                            'value' => 'CY',
                          ),
                          60 => 
                          array (
                            'key' => 'Czechia',
                            'value' => 'CZ',
                          ),
                          61 => 
                          array (
                            'key' => 'Côte d’Ivoire',
                            'value' => 'CI',
                          ),
                          62 => 
                          array (
                            'key' => 'Denmark',
                            'value' => 'DK',
                          ),
                          63 => 
                          array (
                            'key' => 'Diego Garcia',
                            'value' => 'DG',
                          ),
                          64 => 
                          array (
                            'key' => 'Djibouti',
                            'value' => 'DJ',
                          ),
                          65 => 
                          array (
                            'key' => 'Dominica',
                            'value' => 'DM',
                          ),
                          66 => 
                          array (
                            'key' => 'Dominican Republic',
                            'value' => 'DO',
                          ),
                          67 => 
                          array (
                            'key' => 'Ecuador',
                            'value' => 'EC',
                          ),
                          68 => 
                          array (
                            'key' => 'Egypt',
                            'value' => 'EG',
                          ),
                          69 => 
                          array (
                            'key' => 'El Salvador',
                            'value' => 'SV',
                          ),
                          70 => 
                          array (
                            'key' => 'Equatorial Guinea',
                            'value' => 'GQ',
                          ),
                          71 => 
                          array (
                            'key' => 'Eritrea',
                            'value' => 'ER',
                          ),
                          72 => 
                          array (
                            'key' => 'Estonia',
                            'value' => 'EE',
                          ),
                          73 => 
                          array (
                            'key' => 'Eswatini',
                            'value' => 'SZ',
                          ),
                          74 => 
                          array (
                            'key' => 'Ethiopia',
                            'value' => 'ET',
                          ),
                          75 => 
                          array (
                            'key' => 'Falkland Islands',
                            'value' => 'FK',
                          ),
                          76 => 
                          array (
                            'key' => 'Faroe Islands',
                            'value' => 'FO',
                          ),
                          77 => 
                          array (
                            'key' => 'Fiji',
                            'value' => 'FJ',
                          ),
                          78 => 
                          array (
                            'key' => 'Finland',
                            'value' => 'FI',
                          ),
                          79 => 
                          array (
                            'key' => 'France',
                            'value' => 'FR',
                          ),
                          80 => 
                          array (
                            'key' => 'French Guiana',
                            'value' => 'GF',
                          ),
                          81 => 
                          array (
                            'key' => 'French Polynesia',
                            'value' => 'PF',
                          ),
                          82 => 
                          array (
                            'key' => 'French Southern Territories',
                            'value' => 'TF',
                          ),
                          83 => 
                          array (
                            'key' => 'Gabon',
                            'value' => 'GA',
                          ),
                          84 => 
                          array (
                            'key' => 'Gambia',
                            'value' => 'GM',
                          ),
                          85 => 
                          array (
                            'key' => 'Georgia',
                            'value' => 'GE',
                          ),
                          86 => 
                          array (
                            'key' => 'Germany',
                            'value' => 'DE',
                          ),
                          87 => 
                          array (
                            'key' => 'Ghana',
                            'value' => 'GH',
                          ),
                          88 => 
                          array (
                            'key' => 'Gibraltar',
                            'value' => 'GI',
                          ),
                          89 => 
                          array (
                            'key' => 'Greece',
                            'value' => 'GR',
                          ),
                          90 => 
                          array (
                            'key' => 'Greenland',
                            'value' => 'GL',
                          ),
                          91 => 
                          array (
                            'key' => 'Grenada',
                            'value' => 'GD',
                          ),
                          92 => 
                          array (
                            'key' => 'Guadeloupe',
                            'value' => 'GP',
                          ),
                          93 => 
                          array (
                            'key' => 'Guam',
                            'value' => 'GU',
                          ),
                          94 => 
                          array (
                            'key' => 'Guatemala',
                            'value' => 'GT',
                          ),
                          95 => 
                          array (
                            'key' => 'Guernsey',
                            'value' => 'GG',
                          ),
                          96 => 
                          array (
                            'key' => 'Guinea',
                            'value' => 'GN',
                          ),
                          97 => 
                          array (
                            'key' => 'Guinea-Bissau',
                            'value' => 'GW',
                          ),
                          98 => 
                          array (
                            'key' => 'Guyana',
                            'value' => 'GY',
                          ),
                          99 => 
                          array (
                            'key' => 'Haiti',
                            'value' => 'HT',
                          ),
                          100 => 
                          array (
                            'key' => 'Honduras',
                            'value' => 'HN',
                          ),
                          101 => 
                          array (
                            'key' => 'Hong Kong SAR China',
                            'value' => 'HK',
                          ),
                          102 => 
                          array (
                            'key' => 'Hungary',
                            'value' => 'HU',
                          ),
                          103 => 
                          array (
                            'key' => 'Iceland',
                            'value' => 'IS',
                          ),
                          104 => 
                          array (
                            'key' => 'India',
                            'value' => 'IN',
                          ),
                          105 => 
                          array (
                            'key' => 'Indonesia',
                            'value' => 'ID',
                          ),
                          106 => 
                          array (
                            'key' => 'Iran',
                            'value' => 'IR',
                          ),
                          107 => 
                          array (
                            'key' => 'Iraq',
                            'value' => 'IQ',
                          ),
                          108 => 
                          array (
                            'key' => 'Ireland',
                            'value' => 'IE',
                          ),
                          109 => 
                          array (
                            'key' => 'Isle of Man',
                            'value' => 'IM',
                          ),
                          110 => 
                          array (
                            'key' => 'Israel',
                            'value' => 'IL',
                          ),
                          111 => 
                          array (
                            'key' => 'Italy',
                            'value' => 'IT',
                          ),
                          112 => 
                          array (
                            'key' => 'Jamaica',
                            'value' => 'JM',
                          ),
                          113 => 
                          array (
                            'key' => 'Japan',
                            'value' => 'JP',
                          ),
                          114 => 
                          array (
                            'key' => 'Jersey',
                            'value' => 'JE',
                          ),
                          115 => 
                          array (
                            'key' => 'Jordan',
                            'value' => 'JO',
                          ),
                          116 => 
                          array (
                            'key' => 'Kazakhstan',
                            'value' => 'KZ',
                          ),
                          117 => 
                          array (
                            'key' => 'Kenya',
                            'value' => 'KE',
                          ),
                          118 => 
                          array (
                            'key' => 'Kiribati',
                            'value' => 'KI',
                          ),
                          119 => 
                          array (
                            'key' => 'Kosovo',
                            'value' => 'XK',
                          ),
                          120 => 
                          array (
                            'key' => 'Kuwait',
                            'value' => 'KW',
                          ),
                          121 => 
                          array (
                            'key' => 'Kyrgyzstan',
                            'value' => 'KG',
                          ),
                          122 => 
                          array (
                            'key' => 'Laos',
                            'value' => 'LA',
                          ),
                          123 => 
                          array (
                            'key' => 'Latvia',
                            'value' => 'LV',
                          ),
                          124 => 
                          array (
                            'key' => 'Lebanon',
                            'value' => 'LB',
                          ),
                          125 => 
                          array (
                            'key' => 'Lesotho',
                            'value' => 'LS',
                          ),
                          126 => 
                          array (
                            'key' => 'Liberia',
                            'value' => 'LR',
                          ),
                          127 => 
                          array (
                            'key' => 'Libya',
                            'value' => 'LY',
                          ),
                          128 => 
                          array (
                            'key' => 'Liechtenstein',
                            'value' => 'LI',
                          ),
                          129 => 
                          array (
                            'key' => 'Lithuania',
                            'value' => 'LT',
                          ),
                          130 => 
                          array (
                            'key' => 'Luxembourg',
                            'value' => 'LU',
                          ),
                          131 => 
                          array (
                            'key' => 'Macao SAR China',
                            'value' => 'MO',
                          ),
                          132 => 
                          array (
                            'key' => 'Madagascar',
                            'value' => 'MG',
                          ),
                          133 => 
                          array (
                            'key' => 'Malawi',
                            'value' => 'MW',
                          ),
                          134 => 
                          array (
                            'key' => 'Malaysia',
                            'value' => 'MY',
                          ),
                          135 => 
                          array (
                            'key' => 'Maldives',
                            'value' => 'MV',
                          ),
                          136 => 
                          array (
                            'key' => 'Mali',
                            'value' => 'ML',
                          ),
                          137 => 
                          array (
                            'key' => 'Malta',
                            'value' => 'MT',
                          ),
                          138 => 
                          array (
                            'key' => 'Marshall Islands',
                            'value' => 'MH',
                          ),
                          139 => 
                          array (
                            'key' => 'Martinique',
                            'value' => 'MQ',
                          ),
                          140 => 
                          array (
                            'key' => 'Mauritania',
                            'value' => 'MR',
                          ),
                          141 => 
                          array (
                            'key' => 'Mauritius',
                            'value' => 'MU',
                          ),
                          142 => 
                          array (
                            'key' => 'Mayotte',
                            'value' => 'YT',
                          ),
                          143 => 
                          array (
                            'key' => 'Mexico',
                            'value' => 'MX',
                          ),
                          144 => 
                          array (
                            'key' => 'Micronesia',
                            'value' => 'FM',
                          ),
                          145 => 
                          array (
                            'key' => 'Moldova',
                            'value' => 'MD',
                          ),
                          146 => 
                          array (
                            'key' => 'Monaco',
                            'value' => 'MC',
                          ),
                          147 => 
                          array (
                            'key' => 'Mongolia',
                            'value' => 'MN',
                          ),
                          148 => 
                          array (
                            'key' => 'Montenegro',
                            'value' => 'ME',
                          ),
                          149 => 
                          array (
                            'key' => 'Montserrat',
                            'value' => 'MS',
                          ),
                          150 => 
                          array (
                            'key' => 'Morocco',
                            'value' => 'MA',
                          ),
                          151 => 
                          array (
                            'key' => 'Mozambique',
                            'value' => 'MZ',
                          ),
                          152 => 
                          array (
                            'key' => 'Myanmar (Burma)',
                            'value' => 'MM',
                          ),
                          153 => 
                          array (
                            'key' => 'Namibia',
                            'value' => 'NA',
                          ),
                          154 => 
                          array (
                            'key' => 'Nauru',
                            'value' => 'NR',
                          ),
                          155 => 
                          array (
                            'key' => 'Nepal',
                            'value' => 'NP',
                          ),
                          156 => 
                          array (
                            'key' => 'Netherlands',
                            'value' => 'NL',
                          ),
                          157 => 
                          array (
                            'key' => 'New Caledonia',
                            'value' => 'NC',
                          ),
                          158 => 
                          array (
                            'key' => 'New Zealand',
                            'value' => 'NZ',
                          ),
                          159 => 
                          array (
                            'key' => 'Nicaragua',
                            'value' => 'NI',
                          ),
                          160 => 
                          array (
                            'key' => 'Niger',
                            'value' => 'NE',
                          ),
                          161 => 
                          array (
                            'key' => 'Nigeria',
                            'value' => 'NG',
                          ),
                          162 => 
                          array (
                            'key' => 'Niue',
                            'value' => 'NU',
                          ),
                          163 => 
                          array (
                            'key' => 'Norfolk Island',
                            'value' => 'NF',
                          ),
                          164 => 
                          array (
                            'key' => 'North Korea',
                            'value' => 'KP',
                          ),
                          165 => 
                          array (
                            'key' => 'North Macedonia',
                            'value' => 'MK',
                          ),
                          166 => 
                          array (
                            'key' => 'Northern Mariana Islands',
                            'value' => 'MP',
                          ),
                          167 => 
                          array (
                            'key' => 'Norway',
                            'value' => 'NO',
                          ),
                          168 => 
                          array (
                            'key' => 'Oman',
                            'value' => 'OM',
                          ),
                          169 => 
                          array (
                            'key' => 'Pakistan',
                            'value' => 'PK',
                          ),
                          170 => 
                          array (
                            'key' => 'Palau',
                            'value' => 'PW',
                          ),
                          171 => 
                          array (
                            'key' => 'Palestinian Territories',
                            'value' => 'PS',
                          ),
                          172 => 
                          array (
                            'key' => 'Panama',
                            'value' => 'PA',
                          ),
                          173 => 
                          array (
                            'key' => 'Papua New Guinea',
                            'value' => 'PG',
                          ),
                          174 => 
                          array (
                            'key' => 'Paraguay',
                            'value' => 'PY',
                          ),
                          175 => 
                          array (
                            'key' => 'Peru',
                            'value' => 'PE',
                          ),
                          176 => 
                          array (
                            'key' => 'Philippines',
                            'value' => 'PH',
                          ),
                          177 => 
                          array (
                            'key' => 'Pitcairn Islands',
                            'value' => 'PN',
                          ),
                          178 => 
                          array (
                            'key' => 'Poland',
                            'value' => 'PL',
                          ),
                          179 => 
                          array (
                            'key' => 'Portugal',
                            'value' => 'PT',
                          ),
                          180 => 
                          array (
                            'key' => 'Pseudo-Accents',
                            'value' => 'XA',
                          ),
                          181 => 
                          array (
                            'key' => 'Pseudo-Bidi',
                            'value' => 'XB',
                          ),
                          182 => 
                          array (
                            'key' => 'Puerto Rico',
                            'value' => 'PR',
                          ),
                          183 => 
                          array (
                            'key' => 'Qatar',
                            'value' => 'QA',
                          ),
                          184 => 
                          array (
                            'key' => 'Romania',
                            'value' => 'RO',
                          ),
                          185 => 
                          array (
                            'key' => 'Russia',
                            'value' => 'RU',
                          ),
                          186 => 
                          array (
                            'key' => 'Rwanda',
                            'value' => 'RW',
                          ),
                          187 => 
                          array (
                            'key' => 'Réunion',
                            'value' => 'RE',
                          ),
                          188 => 
                          array (
                            'key' => 'Samoa',
                            'value' => 'WS',
                          ),
                          189 => 
                          array (
                            'key' => 'San Marino',
                            'value' => 'SM',
                          ),
                          190 => 
                          array (
                            'key' => 'Saudi Arabia',
                            'value' => 'SA',
                          ),
                          191 => 
                          array (
                            'key' => 'Senegal',
                            'value' => 'SN',
                          ),
                          192 => 
                          array (
                            'key' => 'Serbia',
                            'value' => 'RS',
                          ),
                          193 => 
                          array (
                            'key' => 'Seychelles',
                            'value' => 'SC',
                          ),
                          194 => 
                          array (
                            'key' => 'Sierra Leone',
                            'value' => 'SL',
                          ),
                          195 => 
                          array (
                            'key' => 'Singapore',
                            'value' => 'SG',
                          ),
                          196 => 
                          array (
                            'key' => 'Sint Maarten',
                            'value' => 'SX',
                          ),
                          197 => 
                          array (
                            'key' => 'Slovakia',
                            'value' => 'SK',
                          ),
                          198 => 
                          array (
                            'key' => 'Slovenia',
                            'value' => 'SI',
                          ),
                          199 => 
                          array (
                            'key' => 'Solomon Islands',
                            'value' => 'SB',
                          ),
                          200 => 
                          array (
                            'key' => 'Somalia',
                            'value' => 'SO',
                          ),
                          201 => 
                          array (
                            'key' => 'South Africa',
                            'value' => 'ZA',
                          ),
                          202 => 
                          array (
                            'key' => 'South Georgia & South Sandwich Islands',
                            'value' => 'GS',
                          ),
                          203 => 
                          array (
                            'key' => 'South Korea',
                            'value' => 'KR',
                          ),
                          204 => 
                          array (
                            'key' => 'South Sudan',
                            'value' => 'SS',
                          ),
                          205 => 
                          array (
                            'key' => 'Spain',
                            'value' => 'ES',
                          ),
                          206 => 
                          array (
                            'key' => 'Sri Lanka',
                            'value' => 'LK',
                          ),
                          207 => 
                          array (
                            'key' => 'St. Barthélemy',
                            'value' => 'BL',
                          ),
                          208 => 
                          array (
                            'key' => 'St. Helena',
                            'value' => 'SH',
                          ),
                          209 => 
                          array (
                            'key' => 'St. Kitts & Nevis',
                            'value' => 'KN',
                          ),
                          210 => 
                          array (
                            'key' => 'St. Lucia',
                            'value' => 'LC',
                          ),
                          211 => 
                          array (
                            'key' => 'St. Martin',
                            'value' => 'MF',
                          ),
                          212 => 
                          array (
                            'key' => 'St. Pierre & Miquelon',
                            'value' => 'PM',
                          ),
                          213 => 
                          array (
                            'key' => 'St. Vincent & Grenadines',
                            'value' => 'VC',
                          ),
                          214 => 
                          array (
                            'key' => 'Sudan',
                            'value' => 'SD',
                          ),
                          215 => 
                          array (
                            'key' => 'Suriname',
                            'value' => 'SR',
                          ),
                          216 => 
                          array (
                            'key' => 'Svalbard & Jan Mayen',
                            'value' => 'SJ',
                          ),
                          217 => 
                          array (
                            'key' => 'Sweden',
                            'value' => 'SE',
                          ),
                          218 => 
                          array (
                            'key' => 'Switzerland',
                            'value' => 'CH',
                          ),
                          219 => 
                          array (
                            'key' => 'Syria',
                            'value' => 'SY',
                          ),
                          220 => 
                          array (
                            'key' => 'São Tomé & Príncipe',
                            'value' => 'ST',
                          ),
                          221 => 
                          array (
                            'key' => 'Taiwan',
                            'value' => 'TW',
                          ),
                          222 => 
                          array (
                            'key' => 'Tajikistan',
                            'value' => 'TJ',
                          ),
                          223 => 
                          array (
                            'key' => 'Tanzania',
                            'value' => 'TZ',
                          ),
                          224 => 
                          array (
                            'key' => 'Thailand',
                            'value' => 'TH',
                          ),
                          225 => 
                          array (
                            'key' => 'Timor-Leste',
                            'value' => 'TL',
                          ),
                          226 => 
                          array (
                            'key' => 'Togo',
                            'value' => 'TG',
                          ),
                          227 => 
                          array (
                            'key' => 'Tokelau',
                            'value' => 'TK',
                          ),
                          228 => 
                          array (
                            'key' => 'Tonga',
                            'value' => 'TO',
                          ),
                          229 => 
                          array (
                            'key' => 'Trinidad & Tobago',
                            'value' => 'TT',
                          ),
                          230 => 
                          array (
                            'key' => 'Tristan da Cunha',
                            'value' => 'TA',
                          ),
                          231 => 
                          array (
                            'key' => 'Tunisia',
                            'value' => 'TN',
                          ),
                          232 => 
                          array (
                            'key' => 'Turkey',
                            'value' => 'TR',
                          ),
                          233 => 
                          array (
                            'key' => 'Turkmenistan',
                            'value' => 'TM',
                          ),
                          234 => 
                          array (
                            'key' => 'Turks & Caicos Islands',
                            'value' => 'TC',
                          ),
                          235 => 
                          array (
                            'key' => 'Tuvalu',
                            'value' => 'TV',
                          ),
                          236 => 
                          array (
                            'key' => 'U.S. Outlying Islands',
                            'value' => 'UM',
                          ),
                          237 => 
                          array (
                            'key' => 'U.S. Virgin Islands',
                            'value' => 'VI',
                          ),
                          238 => 
                          array (
                            'key' => 'Uganda',
                            'value' => 'UG',
                          ),
                          239 => 
                          array (
                            'key' => 'Ukraine',
                            'value' => 'UA',
                          ),
                          240 => 
                          array (
                            'key' => 'United Arab Emirates',
                            'value' => 'AE',
                          ),
                          241 => 
                          array (
                            'key' => 'United Kingdom',
                            'value' => 'GB',
                          ),
                          242 => 
                          array (
                            'key' => 'United States',
                            'value' => 'US',
                          ),
                          243 => 
                          array (
                            'key' => 'Uruguay',
                            'value' => 'UY',
                          ),
                          244 => 
                          array (
                            'key' => 'Uzbekistan',
                            'value' => 'UZ',
                          ),
                          245 => 
                          array (
                            'key' => 'Vanuatu',
                            'value' => 'VU',
                          ),
                          246 => 
                          array (
                            'key' => 'Vatican City',
                            'value' => 'VA',
                          ),
                          247 => 
                          array (
                            'key' => 'Venezuela',
                            'value' => 'VE',
                          ),
                          248 => 
                          array (
                            'key' => 'Vietnam',
                            'value' => 'VN',
                          ),
                          249 => 
                          array (
                            'key' => 'Wallis & Futuna',
                            'value' => 'WF',
                          ),
                          250 => 
                          array (
                            'key' => 'Western Sahara',
                            'value' => 'EH',
                          ),
                          251 => 
                          array (
                            'key' => 'Yemen',
                            'value' => 'YE',
                          ),
                          252 => 
                          array (
                            'key' => 'Zambia',
                            'value' => 'ZM',
                          ),
                          253 => 
                          array (
                            'key' => 'Zimbabwe',
                            'value' => 'ZW',
                          ),
                          254 => 
                          array (
                            'key' => 'Åland Islands',
                            'value' => 'AX',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
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
                      4 => 
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