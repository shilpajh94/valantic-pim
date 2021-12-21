<?php 

/** 
* Generated at: 2021-12-21T00:58:41-05:00
* Changed by: system (0)
* IP: 10.141.74.5
*/ 


return Pimcore\Model\DataObject\ClassDefinition\CustomLayout::__set_state(array(
   'id' => '3',
   'name' => 'EditorCS',
   'description' => '',
   'creationDate' => 1634895219,
   'modificationDate' => 1640066321,
   'userOwner' => 2,
   'userModification' => 0,
   'classId' => 'CSProducts',
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
                            'value' => 101,
                            'key' => 'Abdelhakim',
                          ),
                          7 => 
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
                          8 => 
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
                          9 => 
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
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
                          array (
                            'value' => 110,
                            'key' => 'Caliskan',
                          ),
                          13 => 
                          array (
                            'value' => 119,
                            'key' => 'Cochran',
                          ),
                          14 => 
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
                          ),
                          15 => 
                          array (
                            'value' => 115,
                            'key' => 'Dario',
                          ),
                          16 => 
                          array (
                            'value' => 21,
                            'key' => 'Dave (Dave Smith)',
                          ),
                          17 => 
                          array (
                            'value' => 42,
                            'key' => 'dobol (Laszlo Dobo)',
                          ),
                          18 => 
                          array (
                            'value' => 112,
                            'key' => 'Drayling',
                          ),
                          19 => 
                          array (
                            'value' => 128,
                            'key' => 'draylingr1 (Roman Drayling)',
                          ),
                          20 => 
                          array (
                            'value' => 33,
                            'key' => 'editor',
                          ),
                          21 => 
                          array (
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
                          22 => 
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
                          23 => 
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
                          24 => 
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
                          25 => 
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
                          26 => 
                          array (
                            'value' => 125,
                            'key' => 'Joshua',
                          ),
                          27 => 
                          array (
                            'value' => 91,
                            'key' => 'juenemannj (Jens Juenemann)',
                          ),
                          28 => 
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
                          29 => 
                          array (
                            'value' => 107,
                            'key' => 'Kelling',
                          ),
                          30 => 
                          array (
                            'value' => 120,
                            'key' => 'Kiekenap',
                          ),
                          31 => 
                          array (
                            'value' => 133,
                            'key' => 'kiekenapb (Barbara Kiekenap)',
                          ),
                          32 => 
                          array (
                            'value' => 124,
                            'key' => 'Koch',
                          ),
                          33 => 
                          array (
                            'value' => 93,
                            'key' => 'Krausss (Stefan Krauss)',
                          ),
                          34 => 
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
                          35 => 
                          array (
                            'value' => 89,
                            'key' => 'liedtkem (Melanie Liedtke-Sieben)',
                          ),
                          36 => 
                          array (
                            'value' => 77,
                            'key' => 'lohrbergj (Joerg Lohrberg)',
                          ),
                          37 => 
                          array (
                            'value' => 92,
                            'key' => 'LuekeJ (Jan-Philipp Lueke)',
                          ),
                          38 => 
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
                          39 => 
                          array (
                            'value' => 118,
                            'key' => 'Malte',
                          ),
                          40 => 
                          array (
                            'value' => 121,
                            'key' => 'Marchant',
                          ),
                          41 => 
                          array (
                            'value' => 103,
                            'key' => 'marcom',
                          ),
                          42 => 
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
                          43 => 
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
                          44 => 
                          array (
                            'value' => 109,
                            'key' => 'mayank',
                          ),
                          45 => 
                          array (
                            'value' => 81,
                            'key' => 'menzelm (Marisa Menzel)',
                          ),
                          46 => 
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
                          47 => 
                          array (
                            'value' => 114,
                            'key' => 'Nelec',
                          ),
                          48 => 
                          array (
                            'value' => 131,
                            'key' => 'NelecP (Primoz Nelec)',
                          ),
                          49 => 
                          array (
                            'value' => 122,
                            'key' => 'Neuenroth',
                          ),
                          50 => 
                          array (
                            'value' => 75,
                            'key' => 'neuenrothc (Christian Neuenroth)',
                          ),
                          51 => 
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
                          52 => 
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
                          53 => 
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
                          54 => 
                          array (
                            'value' => 79,
                            'key' => 'posseltc (Christof Posselt)',
                          ),
                          55 => 
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
                          56 => 
                          array (
                            'value' => 102,
                            'key' => 'ProdM',
                          ),
                          57 => 
                          array (
                            'value' => 105,
                            'key' => 'ProdOwner',
                          ),
                          58 => 
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
                          59 => 
                          array (
                            'value' => 116,
                            'key' => 'Raffler',
                          ),
                          60 => 
                          array (
                            'value' => 62,
                            'key' => 'rajputa (Amit Rajput)',
                          ),
                          61 => 
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
                          62 => 
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
                          63 => 
                          array (
                            'value' => 104,
                            'key' => 'RND',
                          ),
                          64 => 
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
                          65 => 
                          array (
                            'value' => 82,
                            'key' => 'rowshm (Mehdi Rowshannahad)',
                          ),
                          66 => 
                          array (
                            'value' => 67,
                            'key' => 'schickedanzm (Malte Schickedanz)',
                          ),
                          67 => 
                          array (
                            'value' => 108,
                            'key' => 'Schultz (Rob Schultz)',
                          ),
                          68 => 
                          array (
                            'value' => 70,
                            'key' => 'steinerd (Daniel Steiner)',
                          ),
                          69 => 
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
                          70 => 
                          array (
                            'value' => 132,
                            'key' => 'uia02380 (Leonie Zingel)',
                          ),
                          71 => 
                          array (
                            'value' => 85,
                            'key' => 'uia54546 (Tatjana Kempf)',
                          ),
                          72 => 
                          array (
                            'value' => 86,
                            'key' => 'uia54883 (Janina Gruebel)',
                          ),
                          73 => 
                          array (
                            'value' => 88,
                            'key' => 'uia56532 (Simone Wieland)',
                          ),
                          74 => 
                          array (
                            'value' => 66,
                            'key' => 'uia60821 (Vandana Singal)',
                          ),
                          75 => 
                          array (
                            'value' => 74,
                            'key' => 'uia60823 (Rony Felix)',
                          ),
                          76 => 
                          array (
                            'value' => 68,
                            'key' => 'uia89654 (Kinsey Hastings)',
                          ),
                          77 => 
                          array (
                            'value' => 87,
                            'key' => 'uia94201 (Annika Duerr)',
                          ),
                          78 => 
                          array (
                            'value' => 78,
                            'key' => 'uib09594 (Lars Tiedje)',
                          ),
                          79 => 
                          array (
                            'value' => 126,
                            'key' => 'uib68208 (Krishan Kumar)',
                          ),
                          80 => 
                          array (
                            'value' => 65,
                            'key' => 'uib68209 (Siddharth Chaudhery)',
                          ),
                          81 => 
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Tokunbo Ajepe)',
                          ),
                          82 => 
                          array (
                            'value' => 130,
                            'key' => 'uic17005 (Pinar Caliskan)',
                          ),
                          83 => 
                          array (
                            'value' => 72,
                            'key' => 'uic39540 (Cedric Schulz)',
                          ),
                          84 => 
                          array (
                            'value' => 69,
                            'key' => 'uic52020 (Oktay Oezcan)',
                          ),
                          85 => 
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
                          86 => 
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
                          87 => 
                          array (
                            'value' => 135,
                            'key' => 'uic91640 (Zengping Wang)',
                          ),
                          88 => 
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
                          89 => 
                          array (
                            'value' => 90,
                            'key' => 'uie32847 (Andrea Traeger)',
                          ),
                          90 => 
                          array (
                            'value' => 80,
                            'key' => 'uie42653 (DANIELA ALBUQUERQUE)',
                          ),
                          91 => 
                          array (
                            'value' => 76,
                            'key' => 'UIE43370 (Noah Hartman)',
                          ),
                          92 => 
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
                          93 => 
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
                          94 => 
                          array (
                            'value' => 60,
                            'key' => 'v000886 (Flint Wilson)',
                          ),
                          95 => 
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
                          96 => 
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
                          97 => 
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
                          98 => 
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
                          99 => 
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
                          100 => 
                          array (
                            'value' => 134,
                            'key' => 'v104943 (Rob Schultz)',
                          ),
                          101 => 
                          array (
                            'value' => 84,
                            'key' => 'v105777 (Wesley Coursen)',
                          ),
                          102 => 
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
                          103 => 
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
                          104 => 
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
                          105 => 
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
                          106 => 
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
                          107 => 
                          array (
                            'value' => 123,
                            'key' => 'Wennekamp',
                          ),
                          108 => 
                          array (
                            'value' => 83,
                            'key' => 'wiemannm (Mareike-Elena Wiemann)',
                          ),
                          109 => 
                          array (
                            'value' => 117,
                            'key' => 'Wright',
                          ),
                          110 => 
                          array (
                            'value' => 106,
                            'key' => 'yogesh',
                          ),
                          111 => 
                          array (
                            'value' => 73,
                            'key' => 'za02860 (Chad Peters)',
                          ),
                          112 => 
                          array (
                            'value' => 19,
                            'key' => 'Zach (Zach Christenson)',
                          ),
                          113 => 
                          array (
                            'value' => 129,
                            'key' => 'Zieglerd (Dennis Ziegler)',
                          ),
                          114 => 
                          array (
                            'value' => 113,
                            'key' => 'Zingel',
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
                            'value' => 101,
                            'key' => 'Abdelhakim',
                          ),
                          7 => 
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
                          8 => 
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
                          9 => 
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
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
                          array (
                            'value' => 110,
                            'key' => 'Caliskan',
                          ),
                          13 => 
                          array (
                            'value' => 119,
                            'key' => 'Cochran',
                          ),
                          14 => 
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
                          ),
                          15 => 
                          array (
                            'value' => 115,
                            'key' => 'Dario',
                          ),
                          16 => 
                          array (
                            'value' => 21,
                            'key' => 'Dave (Dave Smith)',
                          ),
                          17 => 
                          array (
                            'value' => 42,
                            'key' => 'dobol (Laszlo Dobo)',
                          ),
                          18 => 
                          array (
                            'value' => 112,
                            'key' => 'Drayling',
                          ),
                          19 => 
                          array (
                            'value' => 128,
                            'key' => 'draylingr1 (Roman Drayling)',
                          ),
                          20 => 
                          array (
                            'value' => 33,
                            'key' => 'editor',
                          ),
                          21 => 
                          array (
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
                          22 => 
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
                          23 => 
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
                          24 => 
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
                          25 => 
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
                          26 => 
                          array (
                            'value' => 125,
                            'key' => 'Joshua',
                          ),
                          27 => 
                          array (
                            'value' => 91,
                            'key' => 'juenemannj (Jens Juenemann)',
                          ),
                          28 => 
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
                          29 => 
                          array (
                            'value' => 107,
                            'key' => 'Kelling',
                          ),
                          30 => 
                          array (
                            'value' => 120,
                            'key' => 'Kiekenap',
                          ),
                          31 => 
                          array (
                            'value' => 133,
                            'key' => 'kiekenapb (Barbara Kiekenap)',
                          ),
                          32 => 
                          array (
                            'value' => 124,
                            'key' => 'Koch',
                          ),
                          33 => 
                          array (
                            'value' => 93,
                            'key' => 'Krausss (Stefan Krauss)',
                          ),
                          34 => 
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
                          35 => 
                          array (
                            'value' => 89,
                            'key' => 'liedtkem (Melanie Liedtke-Sieben)',
                          ),
                          36 => 
                          array (
                            'value' => 77,
                            'key' => 'lohrbergj (Joerg Lohrberg)',
                          ),
                          37 => 
                          array (
                            'value' => 92,
                            'key' => 'LuekeJ (Jan-Philipp Lueke)',
                          ),
                          38 => 
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
                          39 => 
                          array (
                            'value' => 118,
                            'key' => 'Malte',
                          ),
                          40 => 
                          array (
                            'value' => 121,
                            'key' => 'Marchant',
                          ),
                          41 => 
                          array (
                            'value' => 103,
                            'key' => 'marcom',
                          ),
                          42 => 
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
                          43 => 
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
                          44 => 
                          array (
                            'value' => 109,
                            'key' => 'mayank',
                          ),
                          45 => 
                          array (
                            'value' => 81,
                            'key' => 'menzelm (Marisa Menzel)',
                          ),
                          46 => 
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
                          47 => 
                          array (
                            'value' => 114,
                            'key' => 'Nelec',
                          ),
                          48 => 
                          array (
                            'value' => 131,
                            'key' => 'NelecP (Primoz Nelec)',
                          ),
                          49 => 
                          array (
                            'value' => 122,
                            'key' => 'Neuenroth',
                          ),
                          50 => 
                          array (
                            'value' => 75,
                            'key' => 'neuenrothc (Christian Neuenroth)',
                          ),
                          51 => 
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
                          52 => 
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
                          53 => 
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
                          54 => 
                          array (
                            'value' => 79,
                            'key' => 'posseltc (Christof Posselt)',
                          ),
                          55 => 
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
                          56 => 
                          array (
                            'value' => 102,
                            'key' => 'ProdM',
                          ),
                          57 => 
                          array (
                            'value' => 105,
                            'key' => 'ProdOwner',
                          ),
                          58 => 
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
                          59 => 
                          array (
                            'value' => 116,
                            'key' => 'Raffler',
                          ),
                          60 => 
                          array (
                            'value' => 62,
                            'key' => 'rajputa (Amit Rajput)',
                          ),
                          61 => 
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
                          62 => 
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
                          63 => 
                          array (
                            'value' => 104,
                            'key' => 'RND',
                          ),
                          64 => 
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
                          65 => 
                          array (
                            'value' => 82,
                            'key' => 'rowshm (Mehdi Rowshannahad)',
                          ),
                          66 => 
                          array (
                            'value' => 67,
                            'key' => 'schickedanzm (Malte Schickedanz)',
                          ),
                          67 => 
                          array (
                            'value' => 108,
                            'key' => 'Schultz (Rob Schultz)',
                          ),
                          68 => 
                          array (
                            'value' => 70,
                            'key' => 'steinerd (Daniel Steiner)',
                          ),
                          69 => 
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
                          70 => 
                          array (
                            'value' => 132,
                            'key' => 'uia02380 (Leonie Zingel)',
                          ),
                          71 => 
                          array (
                            'value' => 85,
                            'key' => 'uia54546 (Tatjana Kempf)',
                          ),
                          72 => 
                          array (
                            'value' => 86,
                            'key' => 'uia54883 (Janina Gruebel)',
                          ),
                          73 => 
                          array (
                            'value' => 88,
                            'key' => 'uia56532 (Simone Wieland)',
                          ),
                          74 => 
                          array (
                            'value' => 66,
                            'key' => 'uia60821 (Vandana Singal)',
                          ),
                          75 => 
                          array (
                            'value' => 74,
                            'key' => 'uia60823 (Rony Felix)',
                          ),
                          76 => 
                          array (
                            'value' => 68,
                            'key' => 'uia89654 (Kinsey Hastings)',
                          ),
                          77 => 
                          array (
                            'value' => 87,
                            'key' => 'uia94201 (Annika Duerr)',
                          ),
                          78 => 
                          array (
                            'value' => 78,
                            'key' => 'uib09594 (Lars Tiedje)',
                          ),
                          79 => 
                          array (
                            'value' => 126,
                            'key' => 'uib68208 (Krishan Kumar)',
                          ),
                          80 => 
                          array (
                            'value' => 65,
                            'key' => 'uib68209 (Siddharth Chaudhery)',
                          ),
                          81 => 
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Tokunbo Ajepe)',
                          ),
                          82 => 
                          array (
                            'value' => 130,
                            'key' => 'uic17005 (Pinar Caliskan)',
                          ),
                          83 => 
                          array (
                            'value' => 72,
                            'key' => 'uic39540 (Cedric Schulz)',
                          ),
                          84 => 
                          array (
                            'value' => 69,
                            'key' => 'uic52020 (Oktay Oezcan)',
                          ),
                          85 => 
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
                          86 => 
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
                          87 => 
                          array (
                            'value' => 135,
                            'key' => 'uic91640 (Zengping Wang)',
                          ),
                          88 => 
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
                          89 => 
                          array (
                            'value' => 90,
                            'key' => 'uie32847 (Andrea Traeger)',
                          ),
                          90 => 
                          array (
                            'value' => 80,
                            'key' => 'uie42653 (DANIELA ALBUQUERQUE)',
                          ),
                          91 => 
                          array (
                            'value' => 76,
                            'key' => 'UIE43370 (Noah Hartman)',
                          ),
                          92 => 
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
                          93 => 
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
                          94 => 
                          array (
                            'value' => 60,
                            'key' => 'v000886 (Flint Wilson)',
                          ),
                          95 => 
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
                          96 => 
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
                          97 => 
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
                          98 => 
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
                          99 => 
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
                          100 => 
                          array (
                            'value' => 134,
                            'key' => 'v104943 (Rob Schultz)',
                          ),
                          101 => 
                          array (
                            'value' => 84,
                            'key' => 'v105777 (Wesley Coursen)',
                          ),
                          102 => 
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
                          103 => 
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
                          104 => 
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
                          105 => 
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
                          106 => 
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
                          107 => 
                          array (
                            'value' => 123,
                            'key' => 'Wennekamp',
                          ),
                          108 => 
                          array (
                            'value' => 83,
                            'key' => 'wiemannm (Mareike-Elena Wiemann)',
                          ),
                          109 => 
                          array (
                            'value' => 117,
                            'key' => 'Wright',
                          ),
                          110 => 
                          array (
                            'value' => 106,
                            'key' => 'yogesh',
                          ),
                          111 => 
                          array (
                            'value' => 73,
                            'key' => 'za02860 (Chad Peters)',
                          ),
                          112 => 
                          array (
                            'value' => 19,
                            'key' => 'Zach (Zach Christenson)',
                          ),
                          113 => 
                          array (
                            'value' => 129,
                            'key' => 'Zieglerd (Dennis Ziegler)',
                          ),
                          114 => 
                          array (
                            'value' => 113,
                            'key' => 'Zingel',
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
                            'value' => 101,
                            'key' => 'Abdelhakim',
                          ),
                          7 => 
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
                          8 => 
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
                          9 => 
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
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
                          array (
                            'value' => 110,
                            'key' => 'Caliskan',
                          ),
                          13 => 
                          array (
                            'value' => 119,
                            'key' => 'Cochran',
                          ),
                          14 => 
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
                          ),
                          15 => 
                          array (
                            'value' => 115,
                            'key' => 'Dario',
                          ),
                          16 => 
                          array (
                            'value' => 21,
                            'key' => 'Dave (Dave Smith)',
                          ),
                          17 => 
                          array (
                            'value' => 42,
                            'key' => 'dobol (Laszlo Dobo)',
                          ),
                          18 => 
                          array (
                            'value' => 112,
                            'key' => 'Drayling',
                          ),
                          19 => 
                          array (
                            'value' => 128,
                            'key' => 'draylingr1 (Roman Drayling)',
                          ),
                          20 => 
                          array (
                            'value' => 33,
                            'key' => 'editor',
                          ),
                          21 => 
                          array (
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
                          22 => 
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
                          23 => 
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
                          24 => 
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
                          25 => 
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
                          26 => 
                          array (
                            'value' => 125,
                            'key' => 'Joshua',
                          ),
                          27 => 
                          array (
                            'value' => 91,
                            'key' => 'juenemannj (Jens Juenemann)',
                          ),
                          28 => 
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
                          29 => 
                          array (
                            'value' => 107,
                            'key' => 'Kelling',
                          ),
                          30 => 
                          array (
                            'value' => 120,
                            'key' => 'Kiekenap',
                          ),
                          31 => 
                          array (
                            'value' => 133,
                            'key' => 'kiekenapb (Barbara Kiekenap)',
                          ),
                          32 => 
                          array (
                            'value' => 124,
                            'key' => 'Koch',
                          ),
                          33 => 
                          array (
                            'value' => 93,
                            'key' => 'Krausss (Stefan Krauss)',
                          ),
                          34 => 
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
                          35 => 
                          array (
                            'value' => 89,
                            'key' => 'liedtkem (Melanie Liedtke-Sieben)',
                          ),
                          36 => 
                          array (
                            'value' => 77,
                            'key' => 'lohrbergj (Joerg Lohrberg)',
                          ),
                          37 => 
                          array (
                            'value' => 92,
                            'key' => 'LuekeJ (Jan-Philipp Lueke)',
                          ),
                          38 => 
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
                          39 => 
                          array (
                            'value' => 118,
                            'key' => 'Malte',
                          ),
                          40 => 
                          array (
                            'value' => 121,
                            'key' => 'Marchant',
                          ),
                          41 => 
                          array (
                            'value' => 103,
                            'key' => 'marcom',
                          ),
                          42 => 
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
                          43 => 
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
                          44 => 
                          array (
                            'value' => 109,
                            'key' => 'mayank',
                          ),
                          45 => 
                          array (
                            'value' => 81,
                            'key' => 'menzelm (Marisa Menzel)',
                          ),
                          46 => 
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
                          47 => 
                          array (
                            'value' => 114,
                            'key' => 'Nelec',
                          ),
                          48 => 
                          array (
                            'value' => 131,
                            'key' => 'NelecP (Primoz Nelec)',
                          ),
                          49 => 
                          array (
                            'value' => 122,
                            'key' => 'Neuenroth',
                          ),
                          50 => 
                          array (
                            'value' => 75,
                            'key' => 'neuenrothc (Christian Neuenroth)',
                          ),
                          51 => 
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
                          52 => 
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
                          53 => 
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
                          54 => 
                          array (
                            'value' => 79,
                            'key' => 'posseltc (Christof Posselt)',
                          ),
                          55 => 
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
                          56 => 
                          array (
                            'value' => 102,
                            'key' => 'ProdM',
                          ),
                          57 => 
                          array (
                            'value' => 105,
                            'key' => 'ProdOwner',
                          ),
                          58 => 
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
                          59 => 
                          array (
                            'value' => 116,
                            'key' => 'Raffler',
                          ),
                          60 => 
                          array (
                            'value' => 62,
                            'key' => 'rajputa (Amit Rajput)',
                          ),
                          61 => 
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
                          62 => 
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
                          63 => 
                          array (
                            'value' => 104,
                            'key' => 'RND',
                          ),
                          64 => 
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
                          65 => 
                          array (
                            'value' => 82,
                            'key' => 'rowshm (Mehdi Rowshannahad)',
                          ),
                          66 => 
                          array (
                            'value' => 67,
                            'key' => 'schickedanzm (Malte Schickedanz)',
                          ),
                          67 => 
                          array (
                            'value' => 108,
                            'key' => 'Schultz (Rob Schultz)',
                          ),
                          68 => 
                          array (
                            'value' => 70,
                            'key' => 'steinerd (Daniel Steiner)',
                          ),
                          69 => 
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
                          70 => 
                          array (
                            'value' => 132,
                            'key' => 'uia02380 (Leonie Zingel)',
                          ),
                          71 => 
                          array (
                            'value' => 85,
                            'key' => 'uia54546 (Tatjana Kempf)',
                          ),
                          72 => 
                          array (
                            'value' => 86,
                            'key' => 'uia54883 (Janina Gruebel)',
                          ),
                          73 => 
                          array (
                            'value' => 88,
                            'key' => 'uia56532 (Simone Wieland)',
                          ),
                          74 => 
                          array (
                            'value' => 66,
                            'key' => 'uia60821 (Vandana Singal)',
                          ),
                          75 => 
                          array (
                            'value' => 74,
                            'key' => 'uia60823 (Rony Felix)',
                          ),
                          76 => 
                          array (
                            'value' => 68,
                            'key' => 'uia89654 (Kinsey Hastings)',
                          ),
                          77 => 
                          array (
                            'value' => 87,
                            'key' => 'uia94201 (Annika Duerr)',
                          ),
                          78 => 
                          array (
                            'value' => 78,
                            'key' => 'uib09594 (Lars Tiedje)',
                          ),
                          79 => 
                          array (
                            'value' => 126,
                            'key' => 'uib68208 (Krishan Kumar)',
                          ),
                          80 => 
                          array (
                            'value' => 65,
                            'key' => 'uib68209 (Siddharth Chaudhery)',
                          ),
                          81 => 
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Tokunbo Ajepe)',
                          ),
                          82 => 
                          array (
                            'value' => 130,
                            'key' => 'uic17005 (Pinar Caliskan)',
                          ),
                          83 => 
                          array (
                            'value' => 72,
                            'key' => 'uic39540 (Cedric Schulz)',
                          ),
                          84 => 
                          array (
                            'value' => 69,
                            'key' => 'uic52020 (Oktay Oezcan)',
                          ),
                          85 => 
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
                          86 => 
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
                          87 => 
                          array (
                            'value' => 135,
                            'key' => 'uic91640 (Zengping Wang)',
                          ),
                          88 => 
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
                          89 => 
                          array (
                            'value' => 90,
                            'key' => 'uie32847 (Andrea Traeger)',
                          ),
                          90 => 
                          array (
                            'value' => 80,
                            'key' => 'uie42653 (DANIELA ALBUQUERQUE)',
                          ),
                          91 => 
                          array (
                            'value' => 76,
                            'key' => 'UIE43370 (Noah Hartman)',
                          ),
                          92 => 
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
                          93 => 
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
                          94 => 
                          array (
                            'value' => 60,
                            'key' => 'v000886 (Flint Wilson)',
                          ),
                          95 => 
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
                          96 => 
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
                          97 => 
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
                          98 => 
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
                          99 => 
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
                          100 => 
                          array (
                            'value' => 134,
                            'key' => 'v104943 (Rob Schultz)',
                          ),
                          101 => 
                          array (
                            'value' => 84,
                            'key' => 'v105777 (Wesley Coursen)',
                          ),
                          102 => 
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
                          103 => 
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
                          104 => 
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
                          105 => 
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
                          106 => 
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
                          107 => 
                          array (
                            'value' => 123,
                            'key' => 'Wennekamp',
                          ),
                          108 => 
                          array (
                            'value' => 83,
                            'key' => 'wiemannm (Mareike-Elena Wiemann)',
                          ),
                          109 => 
                          array (
                            'value' => 117,
                            'key' => 'Wright',
                          ),
                          110 => 
                          array (
                            'value' => 106,
                            'key' => 'yogesh',
                          ),
                          111 => 
                          array (
                            'value' => 73,
                            'key' => 'za02860 (Chad Peters)',
                          ),
                          112 => 
                          array (
                            'value' => 19,
                            'key' => 'Zach (Zach Christenson)',
                          ),
                          113 => 
                          array (
                            'value' => 129,
                            'key' => 'Zieglerd (Dennis Ziegler)',
                          ),
                          114 => 
                          array (
                            'value' => 113,
                            'key' => 'Zingel',
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'AMERICAS',
                            'value' => 7502339,
                          ),
                          1 => 
                          array (
                            'key' => 'APAC',
                            'value' => 7502338,
                          ),
                          2 => 
                          array (
                            'key' => 'EMEA',
                            'value' => 7502337,
                          ),
                          3 => 
                          array (
                            'key' => 'SERVICE',
                            'value' => 7502340,
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
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Australia / South Pacific',
                            'value' => 7502334,
                          ),
                          1 => 
                          array (
                            'key' => 'China & Mongolia',
                            'value' => 7502332,
                          ),
                          2 => 
                          array (
                            'key' => 'Eastern Europe/Russia',
                            'value' => 7502329,
                          ),
                          3 => 
                          array (
                            'key' => 'India',
                            'value' => 7502333,
                          ),
                          4 => 
                          array (
                            'key' => 'Middle East/North Africa',
                            'value' => 7502330,
                          ),
                          5 => 
                          array (
                            'key' => 'North America',
                            'value' => 7502326,
                          ),
                          6 => 
                          array (
                            'key' => 'South America',
                            'value' => 7502327,
                          ),
                          7 => 
                          array (
                            'key' => 'South East Asia',
                            'value' => 7502335,
                          ),
                          8 => 
                          array (
                            'key' => 'Subsahara/South Africa',
                            'value' => 7502331,
                          ),
                          9 => 
                          array (
                            'key' => 'Western Europe',
                            'value' => 7502328,
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
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
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
                         'noteditable' => true,
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
                         'noteditable' => true,
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
                         'noteditable' => true,
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
                         'noteditable' => true,
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
                         'noteditable' => true,
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
                    ),
                     'layout' => NULL,
                     'referencedFields' => 
                    array (
                    ),
                     'fieldDefinitionsCache' => NULL,
                     'name' => 'featureBlock',
                     'title' => 'Feature Block',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                    ),
                     'layout' => NULL,
                     'referencedFields' => 
                    array (
                    ),
                     'fieldDefinitionsCache' => NULL,
                     'name' => 'benefitBlock',
                     'title' => 'benefitBlock',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                  15 => 'ProdAttrSetAA',
                  16 => 'ProdAttrSetAB',
                  17 => 'ProdAttrSetAC',
                  18 => 'ProdAttrSetAD',
                  19 => 'ProdAttrSetAE',
                  20 => 'ProdAttrSetAF',
                  21 => 'ProdAttrSetAG',
                  22 => 'ProdAttrSetAH',
                  23 => 'ProdAttrSetAI',
                  24 => 'ProdAttrSetA',
                  25 => 'ProdAttrSetB',
                  26 => 'ProdAttrSetC',
                  27 => 'ProdAttrSetD',
                  28 => 'ProdAttrSetE',
                  29 => 'ProdAttrSetF',
                  30 => 'ProdAttrSetG',
                  31 => 'ProdAttrSetH',
                  32 => 'ProdAttrSetI',
                  33 => 'ProdAttrSetJ',
                  34 => 'ProdAttrSetK',
                  35 => 'ProdAttrSetL',
                  36 => 'ProdAttrSetM',
                  37 => 'ProdAttrSetN',
                  38 => 'ProdAttrSetO',
                  39 => 'ProdAttrSetP',
                  40 => 'ProdAttrSetQ',
                  41 => 'ProdAttrSetR',
                  42 => 'ProdAttrSetS',
                  43 => 'ProdAttrSetT',
                  44 => 'ProdAttrSetU',
                  45 => 'ProdAttrSetV',
                  46 => 'ProdAttrSetW',
                  47 => 'ProdAttrSetX',
                  48 => 'ProdAttrSetY',
                  49 => 'ProdAttrSetZ',
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
   'default' => 0,
   'dao' => NULL,
));
