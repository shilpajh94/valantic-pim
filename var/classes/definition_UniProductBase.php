<?php

/**
 * Inheritance: no
 * Variants: no
 * Title: Product
 *
 * Fields Summary:
 * - brandData [objectbricks]
 * - skeletonData [objectbricks]
 * - fullProductName [input]
 * - sapMaterialNumber [input]
 * - partNumber [input]
 * - oldMaterialNumber [input]
 * - weightMetric [quantityValue]
 * - weightImperial [quantityValue]
 * - tariffCodes [numeric]
 * - countryOfOrigin [manyToOneRelation]
 * - eanCode [input]
 * - externalId [input]
 * - stccCode [input]
 * - localizedfields [localizedfields]
 * -- sapDescription [input]
 * -- sapDescriptionLanguage [select]
 * -- plantProduced [select]
 * -- productDescriptionShort [textarea]
 * -- productDescriptionLong [textarea]
 * -- productMarking1 [textarea]
 * -- productMarking2 [textarea]
 * -- productDescriptionExtended [wysiwyg]
 * -- prop65 [select]
 * -- roHS [select]
 * -- gprs [select]
 * -- prop65Certificates [manyToOneRelation]
 * -- roHSCertificates [manyToOneRelation]
 * -- gprsCertificates [manyToOneRelation]
 * -- completenessPercentage [input]
 * -- emptyFieldsBrand [textarea]
 * -- emptyFieldsSkeleton [textarea]
 * -- emptyFieldsFinishedGood [textarea]
 * - productGroupSpecific [objectbricks]
 * - competitorCrossReference [manyToManyObjectRelation]
 * - customerReference [manyToManyObjectRelation]
 * - oemCrossReference [manyToManyObjectRelation]
 * - b2bFlag [checkbox]
 * - b2cFlag [checkbox]
 * - printedCatalogueFlag [checkbox]
 * - virtualCatalogueFlag [checkbox]
 * - customerPortalFlag [checkbox]
 * - regions [calculatedValue]
 * - regionalAvailability [manyToManyObjectRelation]
 * - internalCategories [manyToManyObjectRelation]
 * - ghpFullCode [input]
 * - skeletonPimInternalHierarchyCode [calculatedValue]
 * - hierarchySearchData [calculatedValue]
 * - approvalState [input]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'UNI_PR',
   'name' => 'UniProductBase',
   'title' => 'Product',
   'description' => '',
   'creationDate' => NULL,
   'modificationDate' => 1758624883,
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
         'width' => '',
         'height' => '',
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                 'name' => 'brandDataInfo',
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
                 'renderingClass' => '\\App\\Model\\CalculatedValue\\UniProductManagement\\UniProductCustomAlert',
                 'renderingData' => 'info;overlay-edit; Data on this panel is not editable, because it is inherited from the Product Line Brand level.',
                 'border' => false,
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                 'name' => 'brandDataLink',
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
                 'renderingClass' => '@App\\Model\\CalculatedValue\\UniProductManagement\\UniProductCategoryLink',
                 'renderingData' => 'App\\Model\\DataObject\\UniProductManagement\\Objectbrick\\AbstractUniPrBrand',
                 'border' => false,
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'name' => 'brandData',
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
                  0 => 'UniPrBr',
                  1 => 'UniPrBrPts',
                  2 => 'UniPrBrFhs',
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_yellow.png',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                 'name' => 'skeletonDataInfo',
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
                 'renderingClass' => '\\App\\Model\\CalculatedValue\\UniProductManagement\\UniProductCustomAlert',
                 'renderingData' => 'info;overlay-edit; Data on this panel is not editable, because it is inherited from the Skeleton level.',
                 'border' => false,
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                 'name' => 'skeletonDataLink',
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
                 'renderingClass' => '@App\\Model\\CalculatedValue\\UniProductManagement\\UniProductCategoryLink',
                 'renderingData' => 'App\\Model\\DataObject\\UniProductManagement\\Objectbrick\\AbstractUniPrSkeleton',
                 'border' => false,
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'name' => 'skeletonData',
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
                  0 => 'UniPrSkPts',
                  1 => 'UniPrSkFhs',
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_blue.png',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'productBranding',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Branding',
                     'width' => '',
                     'height' => '',
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'fullProductName',
                         'title' => 'Full Product Name',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'item',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Item',
                     'width' => '',
                     'height' => '',
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
                         'title' => NULL,
                         'width' => '',
                         'height' => '',
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
                             'title' => NULL,
                             'width' => 700,
                             'height' => '',
                             'collapsible' => true,
                             'collapsed' => false,
                             'bodyStyle' => 'margin-left:20px;',
                             'datatype' => 'layout',
                             'children' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'sapMaterialNumber',
                                 'title' => 'SAP Material Number',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'partNumber',
                                 'title' => 'Part Number',
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
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
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
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'oldMaterialNumber',
                                 'title' => 'Old Material Number',
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
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
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
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                                 'name' => 'weightMetric',
                                 'title' => 'Weight (Metric)',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                                 'name' => 'weightImperial',
                                 'title' => 'Weight (Imperial)',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'vbox',
                             'fieldLabel' => '',
                             'labelWidth' => 250,
                             'labelAlign' => 'left',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
                             'type' => NULL,
                             'region' => NULL,
                             'title' => NULL,
                             'width' => '',
                             'height' => '',
                             'collapsible' => false,
                             'collapsed' => false,
                             'bodyStyle' => '',
                             'datatype' => 'layout',
                             'children' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'tariffCodes',
                                 'title' => 'Tariff Codes',
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
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'defaultValue' => NULL,
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => true,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 250,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                 'name' => 'countryOfOrigin',
                                 'title' => 'Country Of Origin',
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
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'classes' => 
                                array (
                                  0 => 
                                  array (
                                    'classes' => 'UniPrCountryOfOrigin',
                                  ),
                                ),
                                 'displayMode' => 'combo',
                                 'pathFormatterClass' => '',
                                 'assetInlineDownloadAllowed' => false,
                                 'assetUploadPath' => '',
                                 'allowToClearRelation' => true,
                                 'objectsAllowed' => true,
                                 'assetsAllowed' => false,
                                 'assetTypes' => 
                                array (
                                ),
                                 'documentsAllowed' => false,
                                 'documentTypes' => 
                                array (
                                ),
                                 'width' => 240,
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'eanCode',
                                 'title' => 'EAN / UPC Code',
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
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
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
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'externalId',
                                 'title' => 'External ID',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => '',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
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
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'stccCode',
                                 'title' => 'Standard Transportation Commodity Code (STCC)',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => '',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
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
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'vbox',
                             'fieldLabel' => '',
                             'labelWidth' => 250,
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
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Localized fields',
                         'width' => '',
                         'height' => '',
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
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
                                 'visibleSearch' => true,
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'name' => 'sapDescriptionLanguage',
                                 'title' => 'SAP  Description Language',
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
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'DE',
                                    'value' => 'DE',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'FR',
                                    'value' => 'FR',
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
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'name' => 'plantProduced',
                                 'title' => 'Plant Produced',
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
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'options' => 
                                array (
                                ),
                                 'defaultValue' => '',
                                 'columnLength' => 190,
                                 'dynamicOptions' => false,
                                 'defaultValueGenerator' => '',
                                 'width' => 250,
                                 'optionsProviderType' => 'configure',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'productDescriptionShort',
                                     'title' => 'Product Description  - Short',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => true,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'height' => 100,
                                     'width' => 350,
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'productDescriptionLong',
                                     'title' => 'Product Description - Long',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => true,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'height' => 100,
                                     'width' => 350,
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'productMarking1',
                                     'title' => 'Product Marking - 1',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => true,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'height' => 100,
                                     'width' => 350,
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'productMarking2',
                                     'title' => 'Product Marking - 2',
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
                                     'visibleSearch' => true,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'height' => 100,
                                     'width' => 350,
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                     'name' => 'productDescriptionExtended',
                                     'title' => 'Product Description - Extended',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => true,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'toolbarConfig' => '',
                                     'excludeFromSearchIndex' => false,
                                     'maxCharacters' => '',
                                     'height' => 150,
                                     'width' => '',
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
                                 'labelWidth' => 350,
                                 'labelAlign' => 'left',
                                 'width' => '',
                                 'height' => '',
                                 'fieldDefinitionsCache' => NULL,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'name' => 'Field Container',
                                     'type' => NULL,
                                     'region' => NULL,
                                     'title' => NULL,
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
                                         'title' => NULL,
                                         'width' => 400,
                                         'height' => 0,
                                         'collapsible' => false,
                                         'collapsed' => false,
                                         'bodyStyle' => '',
                                         'datatype' => 'layout',
                                         'children' => 
                                        array (
                                          0 => 
                                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                             'name' => 'prop65',
                                             'title' => 'Prop65',
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
                                             'visibleSearch' => true,
                                             'blockedVarsForExport' => 
                                            array (
                                            ),
                                             'options' => 
                                            array (
                                              0 => 
                                              array (
                                                'key' => 'compliant',
                                                'value' => 'compliant',
                                              ),
                                              1 => 
                                              array (
                                                'key' => 'not compliant',
                                                'value' => 'not compliant',
                                              ),
                                              2 => 
                                              array (
                                                'key' => 'not applicable',
                                                'value' => 'not not applicable',
                                              ),
                                            ),
                                             'defaultValue' => '',
                                             'columnLength' => 190,
                                             'dynamicOptions' => false,
                                             'defaultValueGenerator' => '',
                                             'width' => 250,
                                             'optionsProviderType' => 'configure',
                                             'optionsProviderClass' => '',
                                             'optionsProviderData' => '',
                                          )),
                                          1 => 
                                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                             'name' => 'roHS',
                                             'title' => 'RoHS',
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
                                             'visibleSearch' => true,
                                             'blockedVarsForExport' => 
                                            array (
                                            ),
                                             'options' => 
                                            array (
                                              0 => 
                                              array (
                                                'key' => 'compliant',
                                                'value' => 'compliant',
                                              ),
                                              1 => 
                                              array (
                                                'key' => 'not compliant',
                                                'value' => 'not compliant',
                                              ),
                                              2 => 
                                              array (
                                                'key' => 'not applicable',
                                                'value' => 'not applicable',
                                              ),
                                            ),
                                             'defaultValue' => '',
                                             'columnLength' => 190,
                                             'dynamicOptions' => false,
                                             'defaultValueGenerator' => '',
                                             'width' => 250,
                                             'optionsProviderType' => 'configure',
                                             'optionsProviderClass' => '',
                                             'optionsProviderData' => '',
                                          )),
                                          2 => 
                                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                             'name' => 'gprs',
                                             'title' => 'GPRS',
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
                                             'visibleSearch' => true,
                                             'blockedVarsForExport' => 
                                            array (
                                            ),
                                             'options' => 
                                            array (
                                              0 => 
                                              array (
                                                'key' => 'compliant',
                                                'value' => 'compliant',
                                              ),
                                              1 => 
                                              array (
                                                'key' => 'not applicable',
                                                'value' => 'not applicable',
                                              ),
                                              2 => 
                                              array (
                                                'key' => 'not compliant',
                                                'value' => 'not compliant',
                                              ),
                                            ),
                                             'defaultValue' => '',
                                             'columnLength' => 190,
                                             'dynamicOptions' => false,
                                             'defaultValueGenerator' => '',
                                             'width' => 250,
                                             'optionsProviderType' => 'configure',
                                             'optionsProviderClass' => '',
                                             'optionsProviderData' => '',
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
                                         'title' => NULL,
                                         'width' => 700,
                                         'height' => 0,
                                         'collapsible' => false,
                                         'collapsed' => false,
                                         'bodyStyle' => '',
                                         'datatype' => 'layout',
                                         'children' => 
                                        array (
                                          0 => 
                                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                             'name' => 'prop65Certificates',
                                             'title' => 'Prop65 Certificates',
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
                                             'displayMode' => 'grid',
                                             'pathFormatterClass' => '',
                                             'assetInlineDownloadAllowed' => false,
                                             'assetUploadPath' => '',
                                             'allowToClearRelation' => true,
                                             'objectsAllowed' => false,
                                             'assetsAllowed' => true,
                                             'assetTypes' => 
                                            array (
                                              0 => 
                                              array (
                                                'assetTypes' => 'document',
                                              ),
                                            ),
                                             'documentsAllowed' => false,
                                             'documentTypes' => 
                                            array (
                                            ),
                                             'width' => 350,
                                          )),
                                          1 => 
                                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                             'name' => 'roHSCertificates',
                                             'title' => 'RoHS Certificates',
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
                                             'displayMode' => 'grid',
                                             'pathFormatterClass' => '',
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
                                             'width' => 350,
                                          )),
                                          2 => 
                                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                             'name' => 'gprsCertificates',
                                             'title' => 'GPRS Certificates',
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
                                             'displayMode' => 'grid',
                                             'pathFormatterClass' => '',
                                             'assetInlineDownloadAllowed' => false,
                                             'assetUploadPath' => '/UniProductManagement/Certificates',
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
                                             'width' => 350,
                                          )),
                                        ),
                                         'locked' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'fieldtype' => 'fieldcontainer',
                                         'layout' => 'vbox',
                                         'fieldLabel' => '',
                                         'labelWidth' => 150,
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
                                     'labelWidth' => 200,
                                     'labelAlign' => 'left',
                                  )),
                                ),
                                 'region' => NULL,
                                 'layout' => '',
                                 'maxTabs' => NULL,
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
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'completenessPercentage',
                                     'title' => 'Completeness Percentage',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;border-radius:5px;',
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
                                     'name' => 'emptyFieldsBrand',
                                     'title' => 'Empty Fields Brand',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;border-radius:5px;',
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
                                     'width' => 600,
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'emptyFieldsSkeleton',
                                     'title' => 'Empty Fields Skeleton',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;border-radius:5px;',
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
                                     'width' => 600,
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'emptyFieldsFinishedGood',
                                     'title' => 'Empty Fields Finished Good',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;border-radius:5px;',
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
                                     'width' => 600,
                                  )),
                                ),
                                 'region' => NULL,
                                 'layout' => NULL,
                                 'maxTabs' => NULL,
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
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                         'name' => 'productGroupSpecific',
                         'title' => 'Product Group Specific Data',
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
                          0 => 'UniPrFgFhs',
                          1 => 'UniPrFgDss',
                          2 => 'UniPrFgPts',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/genealogy.svg',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'marketing',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Marketing',
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Localized fields',
                         'width' => '',
                         'height' => '',
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'productDescriptionShort',
                                 'title' => 'Product Description  - Short',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => '',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'maxLength' => NULL,
                                 'showCharCount' => false,
                                 'excludeFromSearchIndex' => false,
                                 'height' => 100,
                                 'width' => 350,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'productDescriptionLong',
                                 'title' => 'Product Description - Long',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => '',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'maxLength' => NULL,
                                 'showCharCount' => false,
                                 'excludeFromSearchIndex' => false,
                                 'height' => 100,
                                 'width' => 350,
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'productMarking1',
                                 'title' => 'Product Marking - 1',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => '',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'maxLength' => NULL,
                                 'showCharCount' => false,
                                 'excludeFromSearchIndex' => false,
                                 'height' => 100,
                                 'width' => 350,
                              )),
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'productMarking2',
                                 'title' => 'Product Marking - 2',
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
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'maxLength' => NULL,
                                 'showCharCount' => false,
                                 'excludeFromSearchIndex' => false,
                                 'height' => 100,
                                 'width' => 350,
                              )),
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                 'name' => 'productDescriptionExtended',
                                 'title' => 'Product Description - Extended',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => '',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'toolbarConfig' => '',
                                 'excludeFromSearchIndex' => false,
                                 'maxCharacters' => '',
                                 'height' => 150,
                                 'width' => '',
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
                             'labelWidth' => 350,
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
                         'fieldtype' => 'fieldset',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/advertising.svg',
                     'labelWidth' => 250,
                     'labelAlign' => 'left',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'crossReferences',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Cross References',
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
                         'title' => NULL,
                         'width' => 600,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                             'name' => 'competitorCrossReference',
                             'title' => 'Competitor Cross Reference',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'classes' => 
                            array (
                              0 => 
                              array (
                                'classes' => 'UniPrCompetitorCrossReference',
                              ),
                            ),
                             'displayMode' => 'combo',
                             'pathFormatterClass' => '',
                             'maxItems' => 0,
                             'visibleFields' => 'competitor,partNumber',
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                             'name' => 'customerReference',
                             'title' => 'Customer Reference',
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
                                'classes' => 'UniPrCustomerReference',
                              ),
                            ),
                             'displayMode' => 'combo',
                             'pathFormatterClass' => '',
                             'maxItems' => NULL,
                             'visibleFields' => 'customer,partNumber',
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
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                             'name' => 'oemCrossReference',
                             'title' => 'OE / OEM Cross Reference',
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
                                'classes' => 'UniPrOemCrossReference',
                              ),
                            ),
                             'displayMode' => 'combo',
                             'pathFormatterClass' => '',
                             'maxItems' => NULL,
                             'visibleFields' => 'oem,partNumber',
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
                         'fieldtype' => 'fieldcontainer',
                         'layout' => 'vbox',
                         'fieldLabel' => '',
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => true,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/objects-meta.svg',
                     'labelWidth' => 250,
                     'labelAlign' => 'left',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'compliance',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Compliance / Regulatory / Quality',
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Localized fields',
                         'width' => '',
                         'height' => '',
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => NULL,
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
                                     'title' => NULL,
                                     'width' => 400,
                                     'height' => 0,
                                     'collapsible' => false,
                                     'collapsed' => false,
                                     'bodyStyle' => '',
                                     'datatype' => 'layout',
                                     'children' => 
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                         'name' => 'prop65',
                                         'title' => 'Prop65',
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
                                         'visibleSearch' => true,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'options' => 
                                        array (
                                          0 => 
                                          array (
                                            'key' => 'compliant',
                                            'value' => 'compliant',
                                          ),
                                          1 => 
                                          array (
                                            'key' => 'not compliant',
                                            'value' => 'not compliant',
                                          ),
                                          2 => 
                                          array (
                                            'key' => 'not applicable',
                                            'value' => 'not not applicable',
                                          ),
                                        ),
                                         'defaultValue' => '',
                                         'columnLength' => 190,
                                         'dynamicOptions' => false,
                                         'defaultValueGenerator' => '',
                                         'width' => 250,
                                         'optionsProviderType' => 'configure',
                                         'optionsProviderClass' => '',
                                         'optionsProviderData' => '',
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                         'name' => 'roHS',
                                         'title' => 'RoHS',
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
                                         'visibleSearch' => true,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'options' => 
                                        array (
                                          0 => 
                                          array (
                                            'key' => 'compliant',
                                            'value' => 'compliant',
                                          ),
                                          1 => 
                                          array (
                                            'key' => 'not compliant',
                                            'value' => 'not compliant',
                                          ),
                                          2 => 
                                          array (
                                            'key' => 'not applicable',
                                            'value' => 'not applicable',
                                          ),
                                        ),
                                         'defaultValue' => '',
                                         'columnLength' => 190,
                                         'dynamicOptions' => false,
                                         'defaultValueGenerator' => '',
                                         'width' => 250,
                                         'optionsProviderType' => 'configure',
                                         'optionsProviderClass' => '',
                                         'optionsProviderData' => '',
                                      )),
                                      2 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                         'name' => 'gprs',
                                         'title' => 'GPRS',
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
                                         'visibleSearch' => true,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'options' => 
                                        array (
                                          0 => 
                                          array (
                                            'key' => 'compliant',
                                            'value' => 'compliant',
                                          ),
                                          1 => 
                                          array (
                                            'key' => 'not applicable',
                                            'value' => 'not applicable',
                                          ),
                                          2 => 
                                          array (
                                            'key' => 'not compliant',
                                            'value' => 'not compliant',
                                          ),
                                        ),
                                         'defaultValue' => '',
                                         'columnLength' => 190,
                                         'dynamicOptions' => false,
                                         'defaultValueGenerator' => '',
                                         'width' => 250,
                                         'optionsProviderType' => 'configure',
                                         'optionsProviderClass' => '',
                                         'optionsProviderData' => '',
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
                                     'title' => NULL,
                                     'width' => 700,
                                     'height' => 0,
                                     'collapsible' => false,
                                     'collapsed' => false,
                                     'bodyStyle' => '',
                                     'datatype' => 'layout',
                                     'children' => 
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                         'name' => 'prop65Certificates',
                                         'title' => 'Prop65 Certificates',
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
                                         'displayMode' => 'grid',
                                         'pathFormatterClass' => '',
                                         'assetInlineDownloadAllowed' => false,
                                         'assetUploadPath' => '',
                                         'allowToClearRelation' => true,
                                         'objectsAllowed' => false,
                                         'assetsAllowed' => true,
                                         'assetTypes' => 
                                        array (
                                          0 => 
                                          array (
                                            'assetTypes' => 'document',
                                          ),
                                        ),
                                         'documentsAllowed' => false,
                                         'documentTypes' => 
                                        array (
                                        ),
                                         'width' => 350,
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                         'name' => 'roHSCertificates',
                                         'title' => 'RoHS Certificates',
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
                                         'displayMode' => 'grid',
                                         'pathFormatterClass' => '',
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
                                         'width' => 350,
                                      )),
                                      2 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                         'name' => 'gprsCertificates',
                                         'title' => 'GPRS Certificates',
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
                                         'displayMode' => 'grid',
                                         'pathFormatterClass' => '',
                                         'assetInlineDownloadAllowed' => false,
                                         'assetUploadPath' => '/UniProductManagement/Certificates',
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
                                         'width' => 350,
                                      )),
                                    ),
                                     'locked' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'fieldtype' => 'fieldcontainer',
                                     'layout' => 'vbox',
                                     'fieldLabel' => '',
                                     'labelWidth' => 150,
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
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'region' => NULL,
                             'layout' => '',
                             'maxTabs' => NULL,
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
                         'fieldtype' => 'fieldset',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/todo_list.svg',
                     'labelWidth' => 250,
                     'labelAlign' => 'left',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'distribution',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Distribution',
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'b2bFlag',
                         'title' => 'B2B Flag',
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
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'b2cFlag',
                         'title' => 'B2C Flag',
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
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'printedCatalogueFlag',
                         'title' => 'Printed Catalogue Flag',
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
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'virtualCatalogueFlag',
                         'title' => 'Virtual Catalogue Flag',
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
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'customerPortalFlag',
                         'title' => 'Customer Portal Flag',
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
                         'visibleSearch' => true,
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
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => true,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/in_transit.svg',
                     'labelWidth' => 250,
                     'labelAlign' => 'left',
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'name' => 'Field Container',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => NULL,
                         'width' => 600,
                         'height' => '',
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\CalculatedValue::__set_state(array(
                             'name' => 'regions',
                             'title' => 'Regions',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => true,
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
                             'width' => 350,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
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
                             'displayMode' => 'combo',
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
                             'width' => 300,
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
                         'labelWidth' => 250,
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'internalHierarchy',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Internal Hierarchy',
             'width' => '',
             'height' => '',
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
                 'title' => NULL,
                 'width' => 500,
                 'height' => '',
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                     'name' => 'internalCategories',
                     'title' => 'Internal Categories',
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
                        'classes' => 'UniProductCategoryInternal',
                      ),
                    ),
                     'displayMode' => 'combo',
                     'pathFormatterClass' => '',
                     'maxItems' => NULL,
                     'visibleFields' => 'level,name,categoryLevel',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\CalculatedValue::__set_state(array(
                     'name' => 'skeletonPimInternalHierarchyCode',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\CalculatedValue::__set_state(array(
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
                     'invisible' => true,
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
                 'fieldtype' => 'fieldcontainer',
                 'layout' => 'vbox',
                 'fieldLabel' => '',
                 'labelWidth' => 250,
                 'labelAlign' => 'left',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'approvalState',
                 'title' => 'Approval State',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
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
                 'defaultValue' => 'created',
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/internal.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'completeness',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Completeness',
             'width' => '',
             'height' => '',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'completenessPercentage',
                     'title' => 'Completeness Percentage',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;border-radius:5px;',
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
                     'name' => 'emptyFieldsBrand',
                     'title' => 'Empty Fields Brand',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;border-radius:5px;',
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
                     'width' => 600,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'emptyFieldsSkeleton',
                     'title' => 'Empty Fields Skeleton',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;border-radius:5px;',
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
                     'width' => 600,
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'emptyFieldsFinishedGood',
                     'title' => 'Empty Fields Finished Good',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;border-radius:5px;',
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
                     'width' => 600,
                  )),
                ),
                 'region' => NULL,
                 'layout' => NULL,
                 'maxTabs' => NULL,
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/accept_database.svg',
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
