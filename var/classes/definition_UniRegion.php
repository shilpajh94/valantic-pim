<?php

/**
 * Inheritance: no
 * Variants: no
 * Title: Region
 *
 * Fields Summary:
 * - name [input]
 */

return \Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'UNI_REG',
   'name' => 'UniRegion',
   'title' => 'Region',
   'description' => '',
   'creationDate' => NULL,
   'modificationDate' => 1743513468,
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
  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
      \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
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
             'width' => '',
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
   'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/translation.svg',
   'group' => 'UniProductManagement',
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
    0 => 
    \Pimcore\Model\DataObject\ClassDefinition\Data\Language::__set_state(array(
       'name' => 'locale',
       'title' => 'Locale',
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
          'key' => 'Chinese',
          'value' => 'zh',
        ),
        1 => 
        array (
          'key' => 'Chinese (China)',
          'value' => 'zh_Hans_CN',
        ),
        2 => 
        array (
          'key' => 'Danish',
          'value' => 'da',
        ),
        3 => 
        array (
          'key' => 'Dutch (Netherlands)',
          'value' => 'nl_NL',
        ),
        4 => 
        array (
          'key' => 'English',
          'value' => 'en',
        ),
        5 => 
        array (
          'key' => 'English (United Kingdom)',
          'value' => 'en_GB',
        ),
        6 => 
        array (
          'key' => 'Finnish (Finland)',
          'value' => 'fi_FI',
        ),
        7 => 
        array (
          'key' => 'French',
          'value' => 'fr',
        ),
        8 => 
        array (
          'key' => 'German',
          'value' => 'de',
        ),
        9 => 
        array (
          'key' => 'Italian (Italy)',
          'value' => 'it_IT',
        ),
        10 => 
        array (
          'key' => 'Japanese (Japan)',
          'value' => 'ja_JP',
        ),
        11 => 
        array (
          'key' => 'Korean (North Korea)',
          'value' => 'ko_KP',
        ),
        12 => 
        array (
          'key' => 'Norwegian Nynorsk (Norway)',
          'value' => 'nn_NO',
        ),
        13 => 
        array (
          'key' => 'Polish (Poland)',
          'value' => 'pl_PL',
        ),
        14 => 
        array (
          'key' => 'Portuguese',
          'value' => 'pt',
        ),
        15 => 
        array (
          'key' => 'Romanian (Romania)',
          'value' => 'ro_RO',
        ),
        16 => 
        array (
          'key' => 'Russian (Russia)',
          'value' => 'ru_RU',
        ),
        17 => 
        array (
          'key' => 'Spanish',
          'value' => 'es',
        ),
        18 => 
        array (
          'key' => 'Swedish (Sweden)',
          'value' => 'sv_SE',
        ),
      ),
       'defaultValue' => NULL,
       'columnLength' => 190,
       'dynamicOptions' => false,
       'defaultValueGenerator' => '',
       'width' => NULL,
       'optionsProviderType' => NULL,
       'optionsProviderClass' => NULL,
       'optionsProviderData' => NULL,
       'onlySystemLanguages' => true,
    )),
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
