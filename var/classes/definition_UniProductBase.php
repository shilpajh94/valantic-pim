<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - productBrandName [input]
 * - localizedfields [localizedfields]
 * -- productSubCategory [input]
 * -- sapDescription [input]
 * - sapMaterialNumber [input]
 * - ghpFullCode [input]
 * - skeletonPimInternalHiearchyCode [calculatedValue]
 * - hierarchySearchData [calculatedValue]
 * - weightMetric [quantityValue]
 * - weightImperial [quantityValue]
 * - technicalProductGroupSpecific [objectbricks]
 * - regionalAvailability [manyToManyObjectRelation]
 * - regions [calculatedValue]
 * - internalCategories [manyToManyObjectRelation]
 */

return \Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'UNI_PR',
   'name' => 'UniProductBase',
   'title' => '',
   'description' => '',
   'creationDate' => NULL,
   'modificationDate' => 1743514399,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => 'App\\Model\\DataObject\\AbstractUniProductBase',
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
      \Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
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
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'brandData',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Brand Data',
             'width' => '',
             'height' => '',
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                 'name' => 'brandDataInclude',
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
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'text',
                 'html' => '',
                 'renderingClass' => '@App\\Model\\CalculatedValue\\UniProductManagement\\UniProductStructureInternalData',
                 'renderingData' => 'App\\Model\\DataObject\\UniProductManagement\\Objectbrick\\AbstractUniPrBrand',
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_yellow.png',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          1 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'skeletonData',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Skeleton Data',
             'width' => '',
             'height' => '',
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                 'name' => 'skeletonDataInclude',
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
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'text',
                 'html' => '',
                 'renderingClass' => '@App\\Model\\CalculatedValue\\UniProductManagement\\UniProductStructureInternalData',
                 'renderingData' => 'App\\Model\\DataObject\\UniProductManagement\\Objectbrick\\AbstractUniPrSkeleton',
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_blue.png',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          2 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'finishedGoodData',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Finished Goods Data',
             'width' => '',
             'height' => '',
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
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
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'productBrandingAttributes',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Branding Attributes',
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
                         'name' => 'productBrandName',
                         'title' => 'Product Brand Name',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => true,
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/star.svg',
                     'labelWidth' => 250,
                     'labelAlign' => 'left',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'category',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Category',
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                         'name' => 'localizedfields',
                         'title' => '',
                         'tooltip' => NULL,
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => NULL,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'productSubCategory',
                             'title' => 'Product Sub Category',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => true,
                             'index' => true,
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
                         'region' => NULL,
                         'layout' => NULL,
                         'maxTabs' => 35,
                         'border' => false,
                         'provideSplitView' => false,
                         'tabPosition' => 'top',
                         'hideLabelsWhenTabsReached' => NULL,
                         'referencedFields' => 
                        array (
                          0 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                             'name' => 'localizedfields',
                             'title' => '',
                             'tooltip' => NULL,
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => NULL,
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'sapDescription',
                                 'title' => 'SAP Description',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => '',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => true,
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
                             'region' => NULL,
                             'layout' => NULL,
                             'maxTabs' => 35,
                             'border' => false,
                             'provideSplitView' => false,
                             'tabPosition' => 'top',
                             'hideLabelsWhenTabsReached' => NULL,
                             'referencedFields' => 
                            array (
                            ),
                             'permissionView' => NULL,
                             'permissionEdit' => NULL,
                             'labelWidth' => 250,
                             'labelAlign' => 'left',
                             'width' => '',
                             'height' => '',
                             'fieldDefinitionsCache' => NULL,
                          )),
                        ),
                         'permissionView' => NULL,
                         'permissionEdit' => NULL,
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
                         'width' => '',
                         'height' => '',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/flow_chart.svg',
                     'labelWidth' => 250,
                     'labelAlign' => 'left',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'itemAttributes',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Item Attributes',
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
                         'name' => 'sapMaterialNumber',
                         'title' => 'SAP Material Number',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => true,
                         'index' => true,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => true,
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
                         'unique' => true,
                         'showCharCount' => false,
                         'width' => '',
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                         'name' => 'localizedfields',
                         'title' => '',
                         'tooltip' => NULL,
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => NULL,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'sapDescription',
                             'title' => 'SAP Description',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => true,
                             'index' => false,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'fieldtype' => '',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => true,
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
                         'region' => NULL,
                         'layout' => NULL,
                         'maxTabs' => 35,
                         'border' => false,
                         'provideSplitView' => false,
                         'tabPosition' => 'top',
                         'hideLabelsWhenTabsReached' => NULL,
                         'referencedFields' => 
                        array (
                        ),
                         'permissionView' => NULL,
                         'permissionEdit' => NULL,
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
                         'width' => '',
                         'height' => '',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/genealogy.svg',
                     'labelWidth' => 250,
                     'labelAlign' => 'left',
                  )),
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'hierarchyAttributes',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Hierarchy Attributes',
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
                         'name' => 'ghpFullCode',
                         'title' => 'Product Hierarchy Full Code (GHP)',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => true,
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
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\CalculatedValue::__set_state(array(
                         'name' => 'skeletonPimInternalHiearchyCode',
                         'title' => 'Skeleton PIM Internal Hierarchy Code',
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
                         'elementType' => 'input',
                         'calculatorType' => 'class',
                         'calculatorExpression' => '',
                         'calculatorClass' => 'App\\Model\\CalculatedValue\\UniProductManagement\\UniProductCategoryFullCode',
                         'columnLength' => 190,
                         'width' => '250px',
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\CalculatedValue::__set_state(array(
                         'name' => 'hierarchySearchData',
                         'title' => 'Hierarchy Search Data',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => true,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'elementType' => 'textarea',
                         'calculatorType' => 'class',
                         'calculatorExpression' => '',
                         'calculatorClass' => '@App\\Model\\CalculatedValue\\UniProductManagement\\UniProductStructureInternalSearchData',
                         'columnLength' => 20000,
                         'width' => '250px',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/tree_structure.svg',
                     'labelWidth' => 250,
                     'labelAlign' => 'left',
                  )),
                  4 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'technicalAttributes',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Technical Attributes',
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'name' => 'weightMetric',
                         'title' => 'Weight (Metric)',
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
                         'unitWidth' => '',
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => 'weight_kg',
                          1 => 'weight_g',
                        ),
                         'unique' => false,
                         'autoConvert' => true,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'defaultValue' => NULL,
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'name' => 'weightImperial',
                         'title' => 'Weight (Imperial)',
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
                         'unitWidth' => '',
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => 'weight_lbs',
                        ),
                         'unique' => false,
                         'autoConvert' => true,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'defaultValue' => NULL,
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                         'name' => 'technicalProductGroupSpecific',
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
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'allowedTypes' => 
                        array (
                          0 => 'UniPrGsTechDss',
                          1 => 'UniPrGsTechPts',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/view_details.svg',
                     'labelWidth' => 250,
                     'labelAlign' => 'left',
                  )),
                  5 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'region',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Regions',
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'regionalAvailability',
                         'title' => 'Available in',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                          0 => 
                          array (
                            'classes' => 'UniRegion',
                          ),
                        ),
                         'displayMode' => 'grid',
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'name',
                         'allowToCreateNewObject' => false,
                         'allowToClearRelation' => true,
                         'optimizedAdminLoading' => false,
                         'enableTextSelection' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'width' => '',
                         'height' => '',
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\CalculatedValue::__set_state(array(
                         'name' => 'regions',
                         'title' => 'Regions',
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
                         'elementType' => 'input',
                         'calculatorType' => 'class',
                         'calculatorExpression' => '',
                         'calculatorClass' => 'App\\Model\\CalculatedValue\\UniProductManagement\\UniProductRegion',
                         'columnLength' => 190,
                         'width' => '',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/marker.svg',
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          3 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'internalCategory',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Internal Category',
             'width' => '',
             'height' => '',
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'name' => 'internalCategories',
                 'title' => 'Internal Categories',
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
                  0 => 
                  array (
                    'classes' => 'UniProductCategoryInternal',
                  ),
                ),
                 'displayMode' => 'grid',
                 'pathFormatterClass' => '',
                 'maxItems' => NULL,
                 'visibleFields' => 'level,name,ghpFullCode',
                 'allowToCreateNewObject' => false,
                 'allowToClearRelation' => true,
                 'optimizedAdminLoading' => false,
                 'enableTextSelection' => false,
                 'visibleFieldDefinitions' => 
                array (
                ),
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/internal.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          4 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'externalCategories',
             'type' => NULL,
             'region' => NULL,
             'title' => 'External Categories',
             'width' => '',
             'height' => '',
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
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
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'text',
                 'html' => '<b>🚩 ​TODO:</b> Add preview of external categories that match this product?',
                 'renderingClass' => '',
                 'renderingData' => '',
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/external.svg',
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
