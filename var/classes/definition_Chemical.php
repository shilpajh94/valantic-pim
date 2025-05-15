<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - Brand [select]
 * - Name [input]
 * - TemperatureRating [numeric]
 * - gasketMaterial [multiselect]
 * - printedCatalog [checkbox]
 * - tubeMaterial [block]
 * -- tubeMaterial [select]
 * -- rating [select]
 * - fittingMaterial [block]
 * -- fittingMaterial [select]
 * -- rating [select]
 * - RatingScale [select]
 */

return \Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '15',
   'name' => 'Chemical',
   'title' => '',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1745818321,
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
         'title' => 'Chemical',
         'width' => 0,
         'height' => 0,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'Brand',
                     'title' => 'Brand',
                     'tooltip' => '
',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => '1',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                     'width' => 350,
                     'optionsProviderType' => 'class',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                     'optionsProviderData' => 'Brand|Name',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'Name',
                     'title' => 'Chemical Name',
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
                     'width' => 350,
                     'defaultValueGenerator' => '',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'TemperatureRating',
                     'title' => 'Temperature Rating ',
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
                     'integer' => true,
                     'unsigned' => true,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => NULL,
                     'width' => 350,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'gasketMaterial',
                     'title' => 'Gasket Material',
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
                        'key' => 'T',
                        'value' => 'T',
                      ),
                      1 => 
                      array (
                        'key' => 'V',
                        'value' => 'V',
                      ),
                      2 => 
                      array (
                        'key' => 'N',
                        'value' => 'N',
                      ),
                      3 => 
                      array (
                        'key' => 'S',
                        'value' => 'S',
                      ),
                      4 => 
                      array (
                        'key' => 'B',
                        'value' => 'B',
                      ),
                    ),
                     'maxItems' => NULL,
                     'renderType' => 'tags',
                     'dynamicOptions' => false,
                     'defaultValue' => NULL,
                     'height' => '',
                     'width' => 350,
                     'defaultValueGenerator' => '',
                     'optionsProviderType' => NULL,
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                  )),
                  4 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'printedCatalog',
                     'title' => 'Printed Catalog',
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
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'name' => 'Description',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'padding-left: 30px; font-size:15px;',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'text',
                     'html' => '<div><div><b>Gasket Material Description</b></div><div><b><br></b></div><div><b>&nbsp; &nbsp; &nbsp; &nbsp; T&nbsp;</b>= Teflon®&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<b>N</b>&nbsp;= Polychloroprene&nbsp;<div><b>&nbsp; &nbsp; &nbsp; &nbsp; V</b>&nbsp;= Viton®&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<b>S</b>&nbsp;= Silicone&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>&nbsp;B&nbsp;</b>= Nitrile</div></div></div><div><br></div><div><b>&nbsp;Rating Scale Description</b></div><div><b><br></b></div><b>&nbsp; &nbsp; &nbsp; &nbsp; A&nbsp;</b>= May be used for Continuous Service&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<b>B</b>&nbsp;= May be used for Intermittent Service&nbsp;<br><b>&nbsp; &nbsp; &nbsp; &nbsp; I</b>&nbsp; = Insufficient data, contact customer service&nbsp; &nbsp; &nbsp;<b>X</b>&nbsp;= Do not use<b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b><div><b><br></b></div><div><br></div>',
                     'renderingClass' => '',
                     'renderingData' => '',
                     'border' => false,
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
          1 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
             'name' => 'tubeMaterial',
             'title' => 'Tube Material ',
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
              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'tubeMaterial',
                 'title' => 'Tube Material',
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
                 'defaultValue' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'class',
                 'optionsProviderClass' => 'ImportBundle\\OptionProvider\\TubeMaterialOptionsProvider',
                 'optionsProviderData' => '',
              )),
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'rating',
                 'title' => 'Rating',
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
                    'key' => 'A',
                    'value' => 'A',
                  ),
                  1 => 
                  array (
                    'key' => 'B',
                    'value' => 'B',
                  ),
                  2 => 
                  array (
                    'key' => 'X',
                    'value' => 'X',
                  ),
                  3 => 
                  array (
                    'key' => 'I',
                    'value' => 'I',
                  ),
                ),
                 'defaultValue' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'configure',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
              )),
            ),
             'layout' => NULL,
             'referencedFields' => 
            array (
            ),
             'fieldDefinitionsCache' => NULL,
          )),
          2 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
             'name' => 'fittingMaterial',
             'title' => 'Fitting Material ',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => 'margin-bottom: 10px;',
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
              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'fittingMaterial',
                 'title' => 'Fitting Material',
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
                 'defaultValue' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'class',
                 'optionsProviderClass' => 'ImportBundle\\OptionProvider\\FittingMaterialOptionsProvider',
                 'optionsProviderData' => '',
              )),
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'rating',
                 'title' => 'Rating',
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
                    'key' => 'A',
                    'value' => 'A',
                  ),
                  1 => 
                  array (
                    'key' => 'B',
                    'value' => 'B',
                  ),
                  2 => 
                  array (
                    'key' => 'X',
                    'value' => 'X',
                  ),
                  3 => 
                  array (
                    'key' => 'I',
                    'value' => 'I',
                  ),
                ),
                 'defaultValue' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'configure',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
              )),
            ),
             'layout' => NULL,
             'referencedFields' => 
            array (
            ),
             'fieldDefinitionsCache' => NULL,
          )),
          3 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'name' => 'RatingScale',
             'title' => 'Rating Scale',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => true,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'options' => 
            array (
              0 => 
              array (
                'key' => 'Continuous Service',
                'value' => 'Continuous Service',
              ),
              1 => 
              array (
                'key' => 'Do not use',
                'value' => 'Do not use',
              ),
              2 => 
              array (
                'key' => 'Insufficient Data',
                'value' => ' contact customer Service',
              ),
              3 => 
              array (
                'key' => 'Intermittent Service',
                'value' => 'Intermittent Service',
              ),
            ),
             'defaultValue' => '',
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => 350,
             'optionsProviderType' => 'configure',
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
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
         'labelWidth' => 150,
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
   'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/datahub.svg',
   'group' => 'Masters',
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
