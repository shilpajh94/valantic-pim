<?php 

/** 
* Generated at: 2021-09-14T08:25:42+02:00
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
- Benefits [input]
- Features [input]
- ProductClaimSlogan [input]
- localizedfields [localizedfields]
-- ProductDescription [textarea]
-- ShortText [textarea]
-- LongText [textarea]
-- CompletenessPercentage [input]
-- EmptyFields [textarea]
- CSProductApplications [manyToManyObjectRelation]
- CSProductFeaturesAndBenefits [manyToManyObjectRelation]
- CSProductIndustries [manyToManyObjectRelation]
- CSRelatedProducts [manyToManyObjectRelation]
- ParentCategory [manyToManyObjectRelation]
- ProductAttributes [objectbricks]
- productImage [image]
- applicationImage [image]
- functionalityImage [image]
- damageImage [image]
- fieldPhoto [image]
- softwareImage [image]
- reportImage [image]
- imageGallery [imageGallery]
- systemAnimation [video]
- systemVideo [video]
- documents [manyToManyRelation]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'CSProducts',
   'name' => 'CSProducts',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1631600742,
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
                            'value' => 86,
                            'key' => 'MarcomUser (Marcom User)',
                          ),
                          25 => 
                          array (
                            'value' => 87,
                            'key' => 'MarcomUser1 (Tehreem Pervez)',
                          ),
                          26 => 
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
                          27 => 
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
                          28 => 
                          array (
                            'value' => 81,
                            'key' => 'menzelm (Marisa Menzel)',
                          ),
                          29 => 
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
                          30 => 
                          array (
                            'value' => 75,
                            'key' => 'neuenrothc (Christian Neuenroth)',
                          ),
                          31 => 
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
                          32 => 
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
                          33 => 
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
                          34 => 
                          array (
                            'value' => 79,
                            'key' => 'posseltc (Christof Posselt)',
                          ),
                          35 => 
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
                          36 => 
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
                          37 => 
                          array (
                            'value' => 85,
                            'key' => 'ProductOwner (Tehreem Pervez)',
                          ),
                          38 => 
                          array (
                            'value' => 62,
                            'key' => 'rajputa (Amit Rajput)',
                          ),
                          39 => 
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
                          40 => 
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
                          41 => 
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
                          42 => 
                          array (
                            'value' => 67,
                            'key' => 'schickedanzm (Malte Schickedanz)',
                          ),
                          43 => 
                          array (
                            'value' => 70,
                            'key' => 'steinerd (Daniel Steiner)',
                          ),
                          44 => 
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
                          45 => 
                          array (
                            'value' => 66,
                            'key' => 'uia60821 (Vandana Singal)',
                          ),
                          46 => 
                          array (
                            'value' => 74,
                            'key' => 'uia60823 (Rony Felix)',
                          ),
                          47 => 
                          array (
                            'value' => 68,
                            'key' => 'uia89654 (Kinsey Hastings)',
                          ),
                          48 => 
                          array (
                            'value' => 78,
                            'key' => 'uib09594 (Lars Tiedje)',
                          ),
                          49 => 
                          array (
                            'value' => 64,
                            'key' => 'uib68208 (Krishan Kumar)',
                          ),
                          50 => 
                          array (
                            'value' => 65,
                            'key' => 'uib68209 (Siddharth Chaudhery)',
                          ),
                          51 => 
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Toks Ajepe)',
                          ),
                          52 => 
                          array (
                            'value' => 72,
                            'key' => 'uic39540 (Cedric Schulz)',
                          ),
                          53 => 
                          array (
                            'value' => 69,
                            'key' => 'uic52020 (Oktay Oezcan)',
                          ),
                          54 => 
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
                          55 => 
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
                          56 => 
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
                          57 => 
                          array (
                            'value' => 80,
                            'key' => 'uie42653 (DANIELA ALBUQUERQUE)',
                          ),
                          58 => 
                          array (
                            'value' => 76,
                            'key' => 'UIE43370 (Noah Hartman)',
                          ),
                          59 => 
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
                          60 => 
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
                          61 => 
                          array (
                            'value' => 60,
                            'key' => 'v000886 (Flint Wilson)',
                          ),
                          62 => 
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
                          63 => 
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
                          64 => 
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
                          65 => 
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
                          66 => 
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
                          67 => 
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
                          68 => 
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
                          69 => 
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
                          70 => 
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
                          71 => 
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
                          72 => 
                          array (
                            'value' => 73,
                            'key' => 'za02860 (Chad Peters)',
                          ),
                          73 => 
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
                         'noteditable' => true,
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
                         'title' => 'is Paused',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => NULL,
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
                         'title' => 'is Archived',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => NULL,
                         'style' => '',
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
                         'noteditable' => false,
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
                         'noteditable' => false,
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
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'fieldtype' => 'manyToManyObjectRelation',
                 'width' => 1010,
                 'height' => '',
                 'maxItems' => '',
                 'queryColumnType' => 'text',
                 'phpdocType' => 'array',
                 'relationType' => true,
                 'visibleFields' => 'id,ApplicationCode,ApplicationName',
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
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'fieldtype' => 'manyToManyObjectRelation',
                 'width' => 1010,
                 'height' => '',
                 'maxItems' => '',
                 'queryColumnType' => 'text',
                 'phpdocType' => 'array',
                 'relationType' => true,
                 'visibleFields' => 'id,FeatureName,FeatureImage',
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
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'fieldtype' => 'manyToManyObjectRelation',
                 'width' => 1010,
                 'height' => '',
                 'maxItems' => '',
                 'queryColumnType' => 'text',
                 'phpdocType' => 'array',
                 'relationType' => true,
                 'visibleFields' => 'id,IndustryCode,IndustryName',
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
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'fieldtype' => 'manyToManyObjectRelation',
                 'width' => 1010,
                 'height' => '',
                 'maxItems' => '',
                 'queryColumnType' => 'text',
                 'phpdocType' => 'array',
                 'relationType' => true,
                 'visibleFields' => 'id,key,RelatedProduct',
                 'allowToCreateNewObject' => false,
                 'optimizedAdminLoading' => false,
                 'visibleFieldDefinitions' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'CSRelatedProducts',
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
                 'style' => 'margin-left:10px;',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'fieldtype' => 'manyToManyObjectRelation',
                 'width' => 1010,
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
                 'style' => 'margin-left:10px; clear:both;',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_yellow.png',
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
                  1 => 'ProdAttrSetB',
                  2 => 'ProdAttrSetC',
                  3 => 'ProdAttrSetD',
                  4 => 'ProdAttrSetE',
                  5 => 'ProdAttrSetF',
                  6 => 'ProdAttrSetG',
                  7 => 'ProdAttrSetH',
                  8 => 'ProdAttrSetI',
                  9 => 'ProdAttrSetJ',
                  10 => 'ProdAttrSetK',
                  11 => 'ProdAttrSetL',
                  12 => 'ProdAttrSetM',
                  13 => 'ProdAttrSetN',
                  14 => 'ProdAttrSetO',
                  15 => 'ProdAttrSetP',
                  16 => 'ProdAttrSetQ',
                  17 => 'ProdAttrSetR',
                  18 => 'ProdAttrSetS',
                  19 => 'ProdAttrSetT',
                  20 => 'ProdAttrSetU',
                  21 => 'ProdAttrSetV',
                  22 => 'ProdAttrSetY',
                  23 => 'ProdAttrSetX',
                  24 => 'ProdAttrSetW',
                  25 => 'ProdAttrSetAA',
                  26 => 'ProdAttrSetAB',
                  27 => 'ProdAttrSetAC',
                  28 => 'ProdAttrSetZ',
                  29 => 'ProdAttrSetAD',
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
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
                              1 => 
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
                              2 => 
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
                                 'width' => 400,
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
                     'noteditable' => false,
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
                     'noteditable' => false,
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
