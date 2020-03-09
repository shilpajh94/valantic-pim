<?php 

/** 
* Generated at: 2019-10-07T16:01:10+05:30
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 203.122.33.130


Fields Summary: 
- productAimsInboxPath [manyToOneRelation]
- productAimsFailedPath [manyToOneRelation]
- productAimsArchivePath [manyToOneRelation]
- productDestinationFolder [manyToOneRelation]
- priceAimsInboxPath [manyToOneRelation]
- priceAimsFailedPath [manyToOneRelation]
- priceAimsArchivePath [manyToOneRelation]
- priceDestinationFolder [manyToOneRelation]
- skipAimsPriceUpdate [checkbox]
- hostbrandInboxPresentationProduct [manyToOneRelation]
- hostbrandInboxPresentationProductArchive [manyToOneRelation]
- hostbrandInboxPresentationProductFailed [manyToOneRelation]
- hostbrandInboxPresentationProductNotInUse [manyToOneRelation]
- hostbrandInboxPresentationArticle [manyToOneRelation]
- hostbrandInboxPresentationArticleArchive [manyToOneRelation]
- hostbrandInboxPresentationArticleFailed [manyToOneRelation]
- hostbrandInboxPresentationArticleNotInUse [manyToOneRelation]
- hostbrandArticleLoaderPath [manyToOneRelation]
- hostbrandProductLoaderPath [manyToOneRelation]
- WorkflowTransitionRule [fieldcollections]
- assetInboxPath [manyToOneRelation]
- assetFailedPath [manyToOneRelation]
- assetNotInUsePath [manyToOneRelation]
- assetRfcPath [manyToOneRelation]
- assetRfmExportPath [manyToOneRelation]
- assetDestinationFolder [manyToOneRelation]
- assetMetadataDestinationFolder [manyToOneRelation]
- assetOrigin [input]
- assetResolution [input]
- assetCallUrl [input]
- imageClientUrl [input]
- sleepBetweenTwoImageDownload [numeric]
- translationUploadDirectory [manyToOneRelation]
- translationFailedPath [manyToOneRelation]
- translationArchivePath [manyToOneRelation]
- directImportLimit [numeric]
- translationExportBatchCount [numeric]
- translationExportDirectory [manyToOneRelation]
- command [select]
- directExportLimit [numeric]
- sampleAimsPriceFile [manyToOneRelation]
- aimsPriceMapping [fieldcollections]
- sampleAimsProductFile [manyToOneRelation]
- aimsProductMapping [fieldcollections]
- sampleAimsArticleFile [manyToOneRelation]
- aimsArticleMapping [fieldcollections]
- sampleHbProductFile [manyToOneRelation]
- hbProductMapping [fieldcollections]
- sampleHBArticleFile [manyToOneRelation]
- hbArticleMapping [fieldcollections]
- sampleProductTranslationFile [manyToOneRelation]
- importProductTranslationMapping [fieldcollections]
- sampleArticleTranslationFile [manyToOneRelation]
- importArticleTranslationMapping [fieldcollections]
- bulkImportInbox [manyToOneRelation]
- bulkImportArchive [manyToOneRelation]
- bulkImportFailed [manyToOneRelation]
- bulkExportDirectory [manyToOneRelation]
- sampleProductBulkImportFile [manyToOneRelation]
- importBulkProductMapping [fieldcollections]
- sampleArticleBulkImportFile [manyToOneRelation]
- importBulkArticleMapping [fieldcollections]
- productsFolderPath [manyToOneRelation]
- priceFolderPath [manyToOneRelation]
- priceWebserviceOffset [numeric]
- priceWebserviceLimit [numeric]
- productWebserviceLimit [numeric]
- sampleOutboundImportExcelFile [manyToOneRelation]
- logRecordFolderPath [manyToOneRelation]
- logFileFolderPath [manyToOneRelation]
- commandsSequence [advancedManyToManyObjectRelation]
- attributeChangeLogsCommand [select]
- notificationTemplateDefault [manyToOneRelation]
- notificationTemplateAimsProduct [manyToOneRelation]
- notificationTemplateAimsPrice [manyToOneRelation]
- notificationTemplateHb [manyToOneRelation]
- notificationTemplateHbLoader [manyToOneRelation]
- notificationTemplateAssets [manyToOneRelation]
- notificationTemplateAssetMapping [manyToOneRelation]
- notificationTemplateAssetDownload [manyToOneRelation]
- notificationTemplateAssetsAFU [manyToOneRelation]
- notificationTemplateTranslation [manyToOneRelation]
- notificationTemplateExport [manyToOneRelation]
- notificationTemplateDailyConsumption [manyToOneRelation]
- notificationTemplateException [manyToOneRelation]
- notificationTemplateArchivedXMLFilesDeletion [manyToOneRelation]
- notificationTemplateIncomingDataLogsArchival [manyToOneRelation]
- notificationTemplateLoadersArchival [manyToOneRelation]
- notificationTemplateBulkImport [manyToOneRelation]
- archiveIncomingDataLogsBeforeXDays [numeric]
- deleteArchivedXMLFilesBeforeXDays [numeric]
- archiveFolderPath [manyToOneRelation]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '12',
   'name' => 'Configuration',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1570444269,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '',
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
         'name' => 'Configs',
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
             'name' => 'AIMS',
             'type' => NULL,
             'region' => NULL,
             'title' => 'AIMS',
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
                 'labelWidth' => 150,
                 'layout' => NULL,
                 'name' => 'Product',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Product Job Config',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => false,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'productAimsInboxPath',
                     'title' => 'Inbox Path',
                     'tooltip' => 'AIMS product files will be picked from this folder for import process',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => false,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'productAimsFailedPath',
                     'title' => 'Failed Path',
                     'tooltip' => 'Failed AIMS product files will be sent to this folder after import process',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => false,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'productAimsArchivePath',
                     'title' => 'Archive Path',
                     'tooltip' => 'Successfully processed AIMS product files will be sent to this folder after import process',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => true,
                     'assetsAllowed' => false,
                     'assetTypes' => 
                    array (
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => false,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'productDestinationFolder',
                     'title' => 'Destination Folder',
                     'tooltip' => ' AIMS Product will be created in this folder after import process',
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
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'fieldtype' => 'panel',
                 'labelWidth' => 150,
                 'layout' => NULL,
                 'name' => 'Price',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Price Job Config',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => false,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'priceAimsInboxPath',
                     'title' => 'Inbox Path',
                     'tooltip' => 'AIMS price files will be picked from this folder for import process',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => false,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'priceAimsFailedPath',
                     'title' => 'Failed Path',
                     'tooltip' => 'Failed AIMS price files will be sent to this folder after import process',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => false,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'priceAimsArchivePath',
                     'title' => 'Archive Path',
                     'tooltip' => 'Successfully processed AIMS price files will be sent to this folder after import process',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => true,
                     'assetsAllowed' => false,
                     'assetTypes' => 
                    array (
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => false,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'priceDestinationFolder',
                     'title' => 'Destination Folder',
                     'tooltip' => ' AIMS price will be created in this folder after import process',
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
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'fieldtype' => 'checkbox',
                     'defaultValue' => 0,
                     'queryColumnType' => 'tinyint(1)',
                     'columnType' => 'tinyint(1)',
                     'phpdocType' => 'boolean',
                     'name' => 'skipAimsPriceUpdate',
                     'title' => 'Skip Price Update?',
                     'tooltip' => 'Flag to skip price update process',
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
              )),
            ),
             'locked' => false,
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 150,
             'layout' => NULL,
             'name' => 'Host Brand',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Host Brand',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                 'fieldtype' => 'fieldset',
                 'labelWidth' => 150,
                 'name' => 'Products',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Products',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandInboxPresentationProduct',
                     'title' => 'Inbox Path',
                     'tooltip' => 'Host Brand product files will be picked from this folder for import process',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandInboxPresentationProductArchive',
                     'title' => 'Archive Path',
                     'tooltip' => 'Successfully processed Host Brand product files will be sent to this folder after import process',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandInboxPresentationProductFailed',
                     'title' => 'Failed Path',
                     'tooltip' => 'Failed host Brand product files will be sent to this folder after import process',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandInboxPresentationProductNotInUse',
                     'title' => 'Not in use path',
                     'tooltip' => 'Not in use host Brand product files will be sent to this folder after import process',
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
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                 'fieldtype' => 'fieldset',
                 'labelWidth' => 150,
                 'name' => 'Articles',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Articles',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandInboxPresentationArticle',
                     'title' => 'Inbox Path',
                     'tooltip' => 'Host Brand article files will be picked from this folder for import process',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandInboxPresentationArticleArchive',
                     'title' => 'Archive Path',
                     'tooltip' => 'Successfully processed Host Brand article files will be sent to this folder after import process',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandInboxPresentationArticleFailed',
                     'title' => 'Failed Path',
                     'tooltip' => 'Failed host Brand article files will be sent to this folder after import process',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandInboxPresentationArticleNotInUse',
                     'title' => 'Not in use',
                     'tooltip' => 'Not in use host Brand article files will be sent to this folder after import process',
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
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'fieldtype' => 'panel',
                 'labelWidth' => 150,
                 'layout' => NULL,
                 'name' => 'Loaders Locations',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Loaders Locations',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => true,
                     'assetsAllowed' => false,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandArticleLoaderPath',
                     'title' => 'Article Loader Path',
                     'tooltip' => 'Host Brand article loader files will be created in this folder after import process',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => true,
                     'assetsAllowed' => false,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'hostbrandProductLoaderPath',
                     'title' => 'Product Loader Path',
                     'tooltip' => 'Host Brand product loader files will be created in this folder after import process',
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
              )),
            ),
             'locked' => false,
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 150,
             'layout' => NULL,
             'name' => 'Workflow',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Workflow Transition Rules',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                 'fieldtype' => 'fieldcollections',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                 'allowedTypes' => 
                array (
                  0 => 'WorkflowTransitionRule',
                ),
                 'lazyLoading' => true,
                 'maxItems' => '',
                 'disallowAddRemove' => false,
                 'disallowReorder' => false,
                 'collapsed' => false,
                 'collapsible' => false,
                 'name' => 'WorkflowTransitionRule',
                 'title' => 'Workflow Transition Rule',
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
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 180,
             'layout' => NULL,
             'name' => 'Assets',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Assets',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => 450,
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => true,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => false,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'assetInboxPath',
                 'title' => 'Inbox Path',
                 'tooltip' => 'Asset files will be picked from this folder for import process',
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
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => 450,
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => true,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => false,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'assetFailedPath',
                 'title' => 'Failed Path',
                 'tooltip' => 'Failed asset files will be sent to this folder after import process',
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
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => 450,
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => true,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => false,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'assetNotInUsePath',
                 'title' => 'Not In Use Path',
                 'tooltip' => 'Asset files which are Not In Use will move to this folder',
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
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => 450,
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => true,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => false,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'assetRfcPath',
                 'title' => 'RFC Path',
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
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => 450,
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => true,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => false,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'assetRfmExportPath',
                 'title' => 'Ready For Mdc Export Path',
                 'tooltip' => 'Successfully processed asset files will be sent to this folder after import process',
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
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => 450,
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => true,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => false,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'assetDestinationFolder',
                 'title' => 'Asset Destination Folder',
                 'tooltip' => 'Downloaded images will be moved to this Asset folder',
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
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => 450,
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => false,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'assetMetadataDestinationFolder',
                 'title' => 'Metadata Destination Folder',
                 'tooltip' => 'Asset EcomMetadata data will be created at this folder in Data Objects after successful asset import process',
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
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'fieldtype' => 'input',
                 'width' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'regex' => '',
                 'unique' => false,
                 'showCharCount' => false,
                 'name' => 'assetOrigin',
                 'title' => 'Asset Origin',
                 'tooltip' => '',
                 'mandatory' => true,
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
              8 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'fieldtype' => 'input',
                 'width' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'regex' => '',
                 'unique' => false,
                 'showCharCount' => false,
                 'name' => 'assetResolution',
                 'title' => 'Asset Resolution',
                 'tooltip' => '',
                 'mandatory' => true,
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
              9 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'fieldtype' => 'input',
                 'width' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'regex' => '',
                 'unique' => false,
                 'showCharCount' => false,
                 'name' => 'assetCallUrl',
                 'title' => 'Asset Call Url',
                 'tooltip' => '',
                 'mandatory' => true,
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
              10 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'fieldtype' => 'input',
                 'width' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'regex' => '',
                 'unique' => false,
                 'showCharCount' => false,
                 'name' => 'imageClientUrl',
                 'title' => 'Image Client Url',
                 'tooltip' => '',
                 'mandatory' => true,
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
              11 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => '',
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => true,
                 'unsigned' => true,
                 'minValue' => 0,
                 'maxValue' => 5,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'sleepBetweenTwoImageDownload',
                 'title' => 'Sleep Between Two Image Download',
                 'tooltip' => '',
                 'mandatory' => true,
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
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'name' => 'Translation',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Translation',
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
                 'labelWidth' => 200,
                 'layout' => NULL,
                 'name' => 'Import Config',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Import Config',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => 450,
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'translationUploadDirectory',
                     'title' => 'Translation Upload Path',
                     'tooltip' => 'Folder location for translation import files',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => 450,
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'translationFailedPath',
                     'title' => 'Translation Failed Path',
                     'tooltip' => 'Folder  location for translation import  files which failed after import process',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => 450,
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => true,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'translationArchivePath',
                     'title' => 'Translation Archive Path',
                     'tooltip' => 'Folder location for translation import  files which were successfully after import',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'fieldtype' => 'numeric',
                     'width' => 100,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'double',
                     'columnType' => 'double',
                     'phpdocType' => 'float',
                     'integer' => true,
                     'unsigned' => false,
                     'minValue' => 0,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => NULL,
                     'name' => 'directImportLimit',
                     'title' => 'Direct Import Limit',
                     'tooltip' => 'Limit for import to be done directly without running the background script.',
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
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'fieldtype' => 'panel',
                 'labelWidth' => 200,
                 'layout' => NULL,
                 'name' => 'Export Config',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Export Config',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'fieldtype' => 'numeric',
                     'width' => 300,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'double',
                     'columnType' => 'double',
                     'phpdocType' => 'float',
                     'integer' => false,
                     'unsigned' => true,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => NULL,
                     'name' => 'translationExportBatchCount',
                     'title' => 'Export Batch Count',
                     'tooltip' => 'The total number of selected records for translation will be divided by this batch number and each batch will be maintained in separate excel files',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => '',
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => false,
                     'assetsAllowed' => true,
                     'assetTypes' => 
                    array (
                      0 => 
                      array (
                        'assetTypes' => 'folder',
                      ),
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'lazyLoading' => false,
                     'classes' => 
                    array (
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'translationExportDirectory',
                     'title' => 'Export Folder',
                     'tooltip' => 'Full translation export will send excel files to this Asset folder',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Products Data Import',
                        'value' => 21,
                      ),
                      1 => 
                      array (
                        'key' => 'Generate Verions',
                        'value' => 20,
                      ),
                      2 => 
                      array (
                        'key' => 'Associate Ecom To New Products',
                        'value' => 19,
                      ),
                      3 => 
                      array (
                        'key' => 'Set Ecom AFU Based On Dates',
                        'value' => 18,
                      ),
                      4 => 
                      array (
                        'key' => 'Objects Fulltext Indexing Command',
                        'value' => 17,
                      ),
                      5 => 
                      array (
                        'key' => '<b>Main Command</b>',
                        'value' => 16,
                      ),
                      6 => 
                      array (
                        'key' => 'Products Data Export',
                        'value' => 12,
                      ),
                      7 => 
                      array (
                        'key' => 'Import Translation Job',
                        'value' => 10,
                      ),
                      8 => 
                      array (
                        'key' => 'Images download',
                        'value' => 8,
                      ),
                      9 => 
                      array (
                        'key' => 'Image Feed',
                        'value' => 7,
                      ),
                      10 => 
                      array (
                        'key' => 'Host Brand XML Data Loader',
                        'value' => 6,
                      ),
                      11 => 
                      array (
                        'key' => 'Enrich Data from Host Brand Loader',
                        'value' => 5,
                      ),
                      12 => 
                      array (
                        'key' => 'Attributes Change Logs',
                        'value' => 4,
                      ),
                      13 => 
                      array (
                        'key' => 'AIMS Products Job',
                        'value' => 2,
                      ),
                      14 => 
                      array (
                        'key' => 'AIMS Price Job',
                        'value' => 1,
                      ),
                    ),
                     'width' => 400,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProvider',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'name' => 'command',
                     'title' => 'Command',
                     'tooltip' => 'CLI command for translation Export process.',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'fieldtype' => 'numeric',
                     'width' => 100,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'double',
                     'columnType' => 'double',
                     'phpdocType' => 'float',
                     'integer' => true,
                     'unsigned' => false,
                     'minValue' => 0,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => NULL,
                     'name' => 'directExportLimit',
                     'title' => 'Direct Export Limit',
                     'tooltip' => 'Limit for export to be done directly without running the background script.',
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
              )),
            ),
             'locked' => false,
          )),
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'name' => 'Inbound Mappings',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Inbound Mappings',
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
                     'labelWidth' => 200,
                     'layout' => NULL,
                     'name' => 'AIMS Price Mapping',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'AIMS Price Mapping',
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
                         'labelWidth' => 180,
                         'layout' => '',
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:none;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => 500,
                             'assetUploadPath' => '/Settings',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'text',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'sampleAimsPriceFile',
                             'title' => 'Sample AIMS Price XML FIle',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'float: left; margin: -5px 40px 0 0;padding-left:10px',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Button::__set_state(array(
                             'fieldtype' => 'button',
                             'handler' => '(function (button){
    // name of the field collection field in configuration class def
    // same name is used to call the function in configuration helper class to read XML files
    var mappingFieldName = \'aimsPriceMapping\';
    // combobox field name in field collection
    var comboName = \'sourceMappingAIMSPrice\';

    var tabpanel = Ext.getCmp("pimcore_panel_tabs");
    var activeTab = tabpanel.getActiveTab();
    var oId = activeTab.object.id;

    let xmlFileTextField = button.up().down(\'textfield\');
    let filePath = xmlFileTextField.getValue();

    if(filePath.trim() != ""){
        Ext.Ajax.request({
            url: "/app/default/add-fieldcols",
            params: {
                xmlFilePath: filePath,
                mappingFieldName: mappingFieldName,
                objectId: oId,
                comboName:comboName
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);
                let fileFound = response.fileFound;
                let validXml = response.validXML;

                if(response.success == true){
                    if(fileFound && validXml){
                        let sourceComponentName = comboName;
                        // columns which needs to be added
                        let notAddedColumns = response.notAddedColumns;

                        let fieldCollectionParentPanel = button.up().next();
                        let firstItemInPanel =  fieldCollectionParentPanel.items.items[0];

                        let count = 0;
                        // to add new row of field collection, we are
                        // clicking the add button with this code
                        for(key in  notAddedColumns){
                            // check if not item added to the panel (FC)
                            if(count == 0 && firstItemInPanel.componentCls == "x-toolbar"){
                                firstItemInPanel.items.items[0].el.dom.click();
                            }else{
                                let allAddedItems = fieldCollectionParentPanel.items.items;
                                let itemCount = allAddedItems.length;

                                // to get the add button on the panel,this will generate an issue if
                                // add is not allowed on fieldcollection. In that case the 0\'th element
                                // will not be add button
                                var addButton = allAddedItems[(itemCount -1)].down(\'toolbar\').items.items[0];
                                addButton.el.dom.click();
                            }
                            let allAddedItems = fieldCollectionParentPanel.items.items;
                            let combo = allAddedItems[(allAddedItems.length - 1)].down(\'[name=\'+sourceComponentName+\']\');
                            combo.setValue(key);
                            count++
                            // just to make the debugging easy
                            // window.aitems = allAddedItems;
                        }
                        if(count > 0){
                            Ext.MessageBox.alert(\'New mapping columns added.\',\'Total \'+count+\' mapping columns added.\');
                        }else{
                            Ext.MessageBox.alert(\'No new mapping column found.\',\'No new mapping column could be found in config.\');
                        }
                    }else{
                        if(!fileFound){
                            Ext.MessageBox.alert(\'File not found\',\'The mapped file was not found.\');
                        }else if(!validXml){
                            Ext.MessageBox.alert(\'XML not valid\',\'The mapped XML file is not valid.\');
                        }
                    }
                }

            }.bind(this),
            error: function (response) {
                console.log(response, "error")
            }.bind(this)
        });
    }

});',
                             'text' => 'Import Config',
                             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/import.svg',
                             'name' => 'Import Config APr',
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                         'fieldtype' => 'fieldcollections',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                         'allowedTypes' => 
                        array (
                          0 => 'MappingAIMSPrice',
                        ),
                         'lazyLoading' => true,
                         'maxItems' => '',
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsed' => false,
                         'collapsible' => false,
                         'name' => 'aimsPriceMapping',
                         'title' => '<strong>AIMS Price Mapping</strong>',
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 200,
                     'layout' => NULL,
                     'name' => 'AIMS Product Mapping',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'AIMS Product Mapping',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => '',
                         'renderingClass' => 'AppBundle\\OptionProvider\\AIMSMappingInfoProvider',
                         'renderingData' => '',
                         'name' => 'aimsProductInfo',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                         'fieldtype' => 'panel',
                         'labelWidth' => 200,
                         'layout' => '',
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:none;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => 500,
                             'assetUploadPath' => '/Settings',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'text',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'sampleAimsProductFile',
                             'title' => 'Sample AIMS Product XML FIle',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'float: left; margin: -5px 40px 0 0;padding-left:10px',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Button::__set_state(array(
                             'fieldtype' => 'button',
                             'handler' => '(function (button){
    // name of the field collection field in configuration class def
    // same name is used to call the function in configuration helper class to read XML files
    var mappingFieldName = \'aimsProductMapping\';
    // combobox field name in field collection
    var comboName = \'sourceMappingAIMSProduct\';

    var tabpanel = Ext.getCmp("pimcore_panel_tabs");
    var activeTab = tabpanel.getActiveTab();
    var oId = activeTab.object.id;

    let xmlFileTextField = button.up().down(\'textfield\');
    let filePath = xmlFileTextField.getValue();

    if(filePath.trim() != ""){
        Ext.Ajax.request({
            url: "/app/default/add-fieldcols",
            params: {
                xmlFilePath: filePath,
                mappingFieldName: mappingFieldName,
                objectId: oId,
                comboName:comboName
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);
                let fileFound = response.fileFound;
                let validXml = response.validXML;

                if(response.success == true){
                    if(fileFound && validXml){
                        let sourceComponentName = comboName;
                        // columns which needs to be added
                        let notAddedColumns = response.notAddedColumns;

                        let fieldCollectionParentPanel = button.up().next();
                        let firstItemInPanel =  fieldCollectionParentPanel.items.items[0];

                        let count = 0;
                        // to add new row of field collection, we are
                        // clicking the add button with this code
                        for(key in  notAddedColumns){
                            // check if not item added to the panel (FC)
                            if(count == 0 && firstItemInPanel.componentCls == "x-toolbar"){
                                firstItemInPanel.items.items[0].el.dom.click();
                            }else{
                                let allAddedItems = fieldCollectionParentPanel.items.items;
                                let itemCount = allAddedItems.length;

                                // to get the add button on the panel,this will generate an issue if
                                // add is not allowed on fieldcollection. In that case the 0\'th element
                                // will not be add button
                                var addButton = allAddedItems[(itemCount -1)].down(\'toolbar\').items.items[0];
                                addButton.el.dom.click();
                            }
                            let allAddedItems = fieldCollectionParentPanel.items.items;
                            let combo = allAddedItems[(allAddedItems.length - 1)].down(\'[name=\'+sourceComponentName+\']\');
                            combo.setValue(key);
                            count++
                            // just to make the debugging easy
                            // window.aitems = allAddedItems;
                        }
                        if(count > 0){
                            Ext.MessageBox.alert(\'New mapping columns added.\',\'Total \'+count+\' mapping columns added.\');
                        }else{
                            Ext.MessageBox.alert(\'No new mapping column found.\',\'No new mapping column could be found in config.\');
                        }
                    }else{
                        if(!fileFound){
                            Ext.MessageBox.alert(\'File not found\',\'The mapped file was not found.\');
                        }else if(!validXml){
                            Ext.MessageBox.alert(\'XML not valid\',\'The mapped XML file is not valid.\');
                        }
                    }
                }

            }.bind(this),
            error: function (response) {
                console.log(response, "error")
            }.bind(this)
        });
    }

});',
                             'text' => 'Import Config',
                             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/import.svg',
                             'name' => 'Import Config AP',
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                         'fieldtype' => 'fieldcollections',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                         'allowedTypes' => 
                        array (
                          0 => 'MappingAIMSProduct',
                        ),
                         'lazyLoading' => true,
                         'maxItems' => '',
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsed' => false,
                         'collapsible' => false,
                         'name' => 'aimsProductMapping',
                         'title' => '<strong>AIMS Product Mapping</strong>',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 200,
                     'layout' => NULL,
                     'name' => 'AIMS Article Mapping',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'AIMS Article Mapping',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => '',
                         'renderingClass' => 'AppBundle\\OptionProvider\\AIMSMappingInfoProvider',
                         'renderingData' => '',
                         'name' => 'aimsArticleInfo',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                         'fieldtype' => 'panel',
                         'labelWidth' => 180,
                         'layout' => '',
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:none;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => 500,
                             'assetUploadPath' => '/Settings',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'text',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'sampleAimsArticleFile',
                             'title' => 'Sample Aims Article XML File',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'float: left; margin: -5px 40px 0 0;padding-left:10px',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Button::__set_state(array(
                             'fieldtype' => 'button',
                             'handler' => '(function (button){
    // name of the field collection field in configuration class def
    // same name is used to call the function in configuration helper class to read XML files
    var mappingFieldName = \'aimsArticleMapping\';
    // combobox field name in field collection
    var comboName = \'sourceMappingAIMSArticle\';

    var tabpanel = Ext.getCmp("pimcore_panel_tabs");
    var activeTab = tabpanel.getActiveTab();
    var oId = activeTab.object.id;

    let xmlFileTextField = button.up().down(\'textfield\');
    let filePath = xmlFileTextField.getValue();

    if(filePath.trim() != ""){
        Ext.Ajax.request({
            url: "/app/default/add-fieldcols",
            params: {
                xmlFilePath: filePath,
                mappingFieldName: mappingFieldName,
                objectId: oId,
                comboName:comboName
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);
                let fileFound = response.fileFound;
                let validXml = response.validXML;

                if(response.success == true){
                    if(fileFound && validXml){
                        let sourceComponentName = comboName;
                        // columns which needs to be added
                        let notAddedColumns = response.notAddedColumns;

                        let fieldCollectionParentPanel = button.up().next();
                        let firstItemInPanel =  fieldCollectionParentPanel.items.items[0];

                        let count = 0;
                        // to add new row of field collection, we are
                        // clicking the add button with this code
                        for(key in  notAddedColumns){
                            // check if not item added to the panel (FC)
                            if(count == 0 && firstItemInPanel.componentCls == "x-toolbar"){
                                firstItemInPanel.items.items[0].el.dom.click();
                            }else{
                                let allAddedItems = fieldCollectionParentPanel.items.items;
                                let itemCount = allAddedItems.length;

                                // to get the add button on the panel,this will generate an issue if
                                // add is not allowed on fieldcollection. In that case the 0\'th element
                                // will not be add button
                                var addButton = allAddedItems[(itemCount -1)].down(\'toolbar\').items.items[0];
                                addButton.el.dom.click();
                            }
                            let allAddedItems = fieldCollectionParentPanel.items.items;
                            let combo = allAddedItems[(allAddedItems.length - 1)].down(\'[name=\'+sourceComponentName+\']\');
                            combo.setValue(key);
                            count++
                            // just to make the debugging easy
                            // window.aitems = allAddedItems;
                        }
                        if(count > 0){
                            Ext.MessageBox.alert(\'New mapping columns added.\',\'Total \'+count+\' mapping columns added.\');
                        }else{
                            Ext.MessageBox.alert(\'No new mapping column found.\',\'No new mapping column could be found in config.\');
                        }
                    }else{
                        if(!fileFound){
                            Ext.MessageBox.alert(\'File not found\',\'The mapped file was not found.\');
                        }else if(!validXml){
                            Ext.MessageBox.alert(\'XML not valid\',\'The mapped XML file is not valid.\');
                        }
                    }
                }

            }.bind(this),
            error: function (response) {
                console.log(response, "error")
            }.bind(this)
        });
    }

});',
                             'text' => 'Import Config',
                             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/import.svg',
                             'name' => 'Import Config AA',
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                         'fieldtype' => 'fieldcollections',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                         'allowedTypes' => 
                        array (
                          0 => 'MappingAIMSArticle',
                        ),
                         'lazyLoading' => true,
                         'maxItems' => '',
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsed' => false,
                         'collapsible' => false,
                         'name' => 'aimsArticleMapping',
                         'title' => '<strong>AIMS Article Mapping</strong>',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 200,
                     'layout' => NULL,
                     'name' => 'HB Product Mapping',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'HB Product Mapping',
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
                         'labelWidth' => 180,
                         'layout' => '',
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:none;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => 500,
                             'assetUploadPath' => '/Settings',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'text',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'sampleHbProductFile',
                             'title' => 'Sample HB Product XML FIle',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'float: left; margin: -5px 40px 0 0;padding-left:10px',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Button::__set_state(array(
                             'fieldtype' => 'button',
                             'handler' => '(function (button){
    // name of the field collection field in configuration class def
    // same name is used to call the function in configuration helper class to read XML files
    var mappingFieldName = \'hbProductMapping\';
    // combobox field name in field collection
    var comboName = \'sourceMappingHbProduct\';

    var tabpanel = Ext.getCmp("pimcore_panel_tabs");
    var activeTab = tabpanel.getActiveTab();
    var oId = activeTab.object.id;

    let xmlFileTextField = button.up().down(\'textfield\');
    let filePath = xmlFileTextField.getValue();

    if(filePath.trim() != ""){
        Ext.Ajax.request({
            url: "/app/default/add-fieldcols",
            params: {
                xmlFilePath: filePath,
                mappingFieldName: mappingFieldName,
                objectId: oId,
                comboName:comboName
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);
                let fileFound = response.fileFound;
                let validXml = response.validXML;

                if(response.success == true){
                    if(fileFound && validXml){
                        let sourceComponentName = comboName;
                        // columns which needs to be added
                        let notAddedColumns = response.notAddedColumns;

                        let fieldCollectionParentPanel = button.up().next();
                        let firstItemInPanel =  fieldCollectionParentPanel.items.items[0];

                        let count = 0;
                        // to add new row of field collection, we are
                        // clicking the add button with this code
                        for(key in  notAddedColumns){
                            // check if not item added to the panel (FC)
                            if(count == 0 && firstItemInPanel.componentCls == "x-toolbar"){
                                firstItemInPanel.items.items[0].el.dom.click();
                            }else{
                                let allAddedItems = fieldCollectionParentPanel.items.items;
                                let itemCount = allAddedItems.length;

                                // to get the add button on the panel,this will generate an issue if
                                // add is not allowed on fieldcollection. In that case the 0\'th element
                                // will not be add button
                                var addButton = allAddedItems[(itemCount -1)].down(\'toolbar\').items.items[0];
                                addButton.el.dom.click();
                            }
                            let allAddedItems = fieldCollectionParentPanel.items.items;
                            let combo = allAddedItems[(allAddedItems.length - 1)].down(\'[name=\'+sourceComponentName+\']\');
                            combo.setValue(key);
                            count++
                            // just to make the debugging easy
                            // window.aitems = allAddedItems;
                        }
                        if(count > 0){
                            Ext.MessageBox.alert(\'New mapping columns added.\',\'Total \'+count+\' mapping columns added.\');
                        }else{
                            Ext.MessageBox.alert(\'No new mapping column found.\',\'No new mapping column could be found in config.\');
                        }
                    }else{
                        if(!fileFound){
                            Ext.MessageBox.alert(\'File not found\',\'The mapped file was not found.\');
                        }else if(!validXml){
                            Ext.MessageBox.alert(\'XML not valid\',\'The mapped XML file is not valid.\');
                        }
                    }
                }

            }.bind(this),
            error: function (response) {
                console.log(response, "error")
            }.bind(this)
        });
    }

});',
                             'text' => 'Import Config',
                             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/import.svg',
                             'name' => 'Import Config HBP',
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                         'fieldtype' => 'fieldcollections',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                         'allowedTypes' => 
                        array (
                          0 => 'MappingHbProduct',
                        ),
                         'lazyLoading' => true,
                         'maxItems' => '',
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsed' => false,
                         'collapsible' => false,
                         'name' => 'hbProductMapping',
                         'title' => '<strong>HB Product Mapping</strong>',
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
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 200,
                     'layout' => NULL,
                     'name' => 'HB Article Mapping',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'HB Article Mapping',
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
                         'labelWidth' => 180,
                         'layout' => '',
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:none;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => 500,
                             'assetUploadPath' => '/Settings',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'text',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'sampleHBArticleFile',
                             'title' => 'Sample HB Article XML FIle',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'float: left; margin: -5px 40px 0 0;padding-left:10px',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Button::__set_state(array(
                             'fieldtype' => 'button',
                             'handler' => '(function (button){
    // name of the field collection field in configuration class def
    // same name is used to call the function in configuration helper class to read XML files
    var mappingFieldName = \'hbArticleMapping\';
    // combobox field name in field collection
    var comboName = \'sourceMappingHbArticle\';

    var tabpanel = Ext.getCmp("pimcore_panel_tabs");
    var activeTab = tabpanel.getActiveTab();
    var oId = activeTab.object.id;

    let xmlFileTextField = button.up().down(\'textfield\');
    let filePath = xmlFileTextField.getValue();

    if(filePath.trim() != ""){
        Ext.Ajax.request({
            url: "/app/default/add-fieldcols",
            params: {
                xmlFilePath: filePath,
                mappingFieldName: mappingFieldName,
                objectId: oId,
                comboName:comboName
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);
                let fileFound = response.fileFound;
                let validXml = response.validXML;

                if(response.success == true){
                    if(fileFound && validXml){
                        let sourceComponentName = comboName;
                        // columns which needs to be added
                        let notAddedColumns = response.notAddedColumns;

                        let fieldCollectionParentPanel = button.up().next();
                        let firstItemInPanel =  fieldCollectionParentPanel.items.items[0];

                        let count = 0;
                        // to add new row of field collection, we are
                        // clicking the add button with this code
                        for(key in  notAddedColumns){
                            // check if not item added to the panel (FC)
                            if(count == 0 && firstItemInPanel.componentCls == "x-toolbar"){
                                firstItemInPanel.items.items[0].el.dom.click();
                            }else{
                                let allAddedItems = fieldCollectionParentPanel.items.items;
                                let itemCount = allAddedItems.length;

                                // to get the add button on the panel,this will generate an issue if
                                // add is not allowed on fieldcollection. In that case the 0\'th element
                                // will not be add button
                                var addButton = allAddedItems[(itemCount -1)].down(\'toolbar\').items.items[0];
                                addButton.el.dom.click();
                            }
                            let allAddedItems = fieldCollectionParentPanel.items.items;
                            let combo = allAddedItems[(allAddedItems.length - 1)].down(\'[name=\'+sourceComponentName+\']\');
                            combo.setValue(key);
                            count++
                            // just to make the debugging easy
                            // window.aitems = allAddedItems;
                        }
                        if(count > 0){
                            Ext.MessageBox.alert(\'New mapping columns added.\',\'Total \'+count+\' mapping columns added.\');
                        }else{
                            Ext.MessageBox.alert(\'No new mapping column found.\',\'No new mapping column could be found in config.\');
                        }
                    }else{
                        if(!fileFound){
                            Ext.MessageBox.alert(\'File not found\',\'The mapped file was not found.\');
                        }else if(!validXml){
                            Ext.MessageBox.alert(\'XML not valid\',\'The mapped XML file is not valid.\');
                        }
                    }
                }

            }.bind(this),
            error: function (response) {
                console.log(response, "error")
            }.bind(this)
        });
    }

});',
                             'text' => 'Import Config',
                             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/import.svg',
                             'name' => 'Import Config HBA',
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                         'fieldtype' => 'fieldcollections',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                         'allowedTypes' => 
                        array (
                          0 => 'MappingHbArticle',
                        ),
                         'lazyLoading' => true,
                         'maxItems' => 0,
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsed' => false,
                         'collapsible' => false,
                         'name' => 'hbArticleMapping',
                         'title' => '<strong>HB Article Mapping</strong>',
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
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 200,
                     'layout' => NULL,
                     'name' => 'Import Product Translation Mapping',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Translation Mapping',
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
                         'labelWidth' => 180,
                         'layout' => '',
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:none;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => 500,
                             'assetUploadPath' => '/Settings',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
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
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'sampleProductTranslationFile',
                             'title' => 'Sample Translation Xlsx FIle',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'float: left; margin: -5px 40px 0 0;padding-left:10px',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Button::__set_state(array(
                             'fieldtype' => 'button',
                             'handler' => '(function (button){
    // name of the field collection field in configuration class def
    // same name is used to call the function in configuration helper class to read XML files
    var mappingFieldName = \'importProductTranslationMapping\';
    // combobox field name in field collection
    var comboName = \'sourceMappingProductTranslation\';

    var tabpanel = Ext.getCmp("pimcore_panel_tabs");
    var activeTab = tabpanel.getActiveTab();
    var oId = activeTab.object.id;

    let xmlFileTextField = button.up().down(\'textfield\');
    let filePath = xmlFileTextField.getValue();

    if(filePath.trim() != ""){
        Ext.Ajax.request({
            url: "/app/default/add-fieldcols",
            params: {
                xmlFilePath: filePath,
                mappingFieldName: mappingFieldName,
                objectId: oId,
                comboName:comboName
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);
                let fileFound = response.fileFound;
                let validXml = response.validXML;

                if(response.success == true){
                    if(fileFound && validXml){
                        let sourceComponentName = comboName;
                        // columns which needs to be added
                        let notAddedColumns = response.notAddedColumns;

                        let fieldCollectionParentPanel = button.up().next();
                        let firstItemInPanel =  fieldCollectionParentPanel.items.items[0];

                        let count = 0;
                        // to add new row of field collection, we are
                        // clicking the add button with this code
                        for(key in  notAddedColumns){
                            // check if not item added to the panel (FC)
                            if(count == 0 && firstItemInPanel.componentCls == "x-toolbar"){
                                firstItemInPanel.items.items[0].el.dom.click();
                            }else{
                                let allAddedItems = fieldCollectionParentPanel.items.items;
                                let itemCount = allAddedItems.length;

                                // to get the add button on the panel,this will generate an issue if
                                // add is not allowed on fieldcollection. In that case the 0\'th element
                                // will not be add button
                                var addButton = allAddedItems[(itemCount -1)].down(\'toolbar\').items.items[0];
                                addButton.el.dom.click();
                            }
                            let allAddedItems = fieldCollectionParentPanel.items.items;
                            let combo = allAddedItems[(allAddedItems.length - 1)].down(\'[name=\'+sourceComponentName+\']\');
                            combo.setValue(key);
                            count++
                            // just to make the debugging easy
                            // window.aitems = allAddedItems;
                        }
                        if(count > 0){
                            Ext.MessageBox.alert(\'New mapping columns added.\',\'Total \'+count+\' mapping columns added.\');
                        }else{
                            Ext.MessageBox.alert(\'No new mapping column found.\',\'No new mapping column could be found in config.\');
                        }
                    }else{
                        if(!fileFound){
                            Ext.MessageBox.alert(\'File not found\',\'The mapped file was not found.\');
                        }else if(!validXml){
                            Ext.MessageBox.alert(\'XML not valid\',\'The mapped XML file is not valid.\');
                        }
                    }
                }

            }.bind(this),
            error: function (response) {
                console.log(response, "error")
            }.bind(this)
        });
    }

});',
                             'text' => 'Import Config',
                             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/import.svg',
                             'name' => 'Import Config Tr Product',
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                         'fieldtype' => 'fieldcollections',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                         'allowedTypes' => 
                        array (
                          0 => 'MappingProductTranslation',
                        ),
                         'lazyLoading' => true,
                         'maxItems' => 0,
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsed' => false,
                         'collapsible' => false,
                         'name' => 'importProductTranslationMapping',
                         'title' => '<strong>Import Product Translation Mapping</strong>',
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
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 200,
                     'layout' => NULL,
                     'name' => 'Import Article Translation Mapping',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Article Translation Mapping',
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
                         'labelWidth' => 180,
                         'layout' => '',
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:none;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => 500,
                             'assetUploadPath' => '/Settings',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
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
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'sampleArticleTranslationFile',
                             'title' => 'Sample Translation Xlsx FIle',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'float: left; margin: -5px 40px 0 0;padding-left:10px',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Button::__set_state(array(
                             'fieldtype' => 'button',
                             'handler' => '(function (button){
    // name of the field collection field in configuration class def
    // same name is used to call the function in configuration helper class to read XML files
    var mappingFieldName = \'importArticleTranslationMapping\';
    // combobox field name in field collection
    var comboName = \'sourceMappingArticleTranslation\';

    var tabpanel = Ext.getCmp("pimcore_panel_tabs");
    var activeTab = tabpanel.getActiveTab();
    var oId = activeTab.object.id;

    let xmlFileTextField = button.up().down(\'textfield\');
    let filePath = xmlFileTextField.getValue();

    if(filePath.trim() != ""){
        Ext.Ajax.request({
            url: "/app/default/add-fieldcols",
            params: {
                xmlFilePath: filePath,
                mappingFieldName: mappingFieldName,
                objectId: oId,
                comboName:comboName
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);
                let fileFound = response.fileFound;
                let validXml = response.validXML;

                if(response.success == true){
                    if(fileFound && validXml){
                        let sourceComponentName = comboName;
                        // columns which needs to be added
                        let notAddedColumns = response.notAddedColumns;

                        let fieldCollectionParentPanel = button.up().next();
                        let firstItemInPanel =  fieldCollectionParentPanel.items.items[0];

                        let count = 0;
                        // to add new row of field collection, we are
                        // clicking the add button with this code
                        for(key in  notAddedColumns){
                            // check if not item added to the panel (FC)
                            if(count == 0 && firstItemInPanel.componentCls == "x-toolbar"){
                                firstItemInPanel.items.items[0].el.dom.click();
                            }else{
                                let allAddedItems = fieldCollectionParentPanel.items.items;
                                let itemCount = allAddedItems.length;

                                // to get the add button on the panel,this will generate an issue if
                                // add is not allowed on fieldcollection. In that case the 0\'th element
                                // will not be add button
                                var addButton = allAddedItems[(itemCount -1)].down(\'toolbar\').items.items[0];
                                addButton.el.dom.click();
                            }
                            let allAddedItems = fieldCollectionParentPanel.items.items;
                            let combo = allAddedItems[(allAddedItems.length - 1)].down(\'[name=\'+sourceComponentName+\']\');
                            combo.setValue(key);
                            count++
                            // just to make the debugging easy
                            // window.aitems = allAddedItems;
                        }
                        if(count > 0){
                            Ext.MessageBox.alert(\'New mapping columns added.\',\'Total \'+count+\' mapping columns added.\');
                        }else{
                            Ext.MessageBox.alert(\'No new mapping column found.\',\'No new mapping column could be found in config.\');
                        }
                    }else{
                        if(!fileFound){
                            Ext.MessageBox.alert(\'File not found\',\'The mapped file was not found.\');
                        }else if(!validXml){
                            Ext.MessageBox.alert(\'XML not valid\',\'The mapped XML file is not valid.\');
                        }
                    }
                }

            }.bind(this),
            error: function (response) {
                console.log(response, "error")
            }.bind(this)
        });
    }

});',
                             'text' => 'Import Config',
                             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/import.svg',
                             'name' => 'Import Config Tr Article',
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                         'fieldtype' => 'fieldcollections',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                         'allowedTypes' => 
                        array (
                          0 => 'MappingArticleTranslation',
                        ),
                         'lazyLoading' => true,
                         'maxItems' => 0,
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsed' => false,
                         'collapsible' => false,
                         'name' => 'importArticleTranslationMapping',
                         'title' => '<strong>Import Article Translation Mapping</strong>',
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
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
          )),
          6 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 200,
             'layout' => NULL,
             'name' => 'Bulk Operations',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Bulk Operations',
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
                     'name' => 'Config',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Config',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Import Config',
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => '',
                             'assetUploadPath' => '',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'folder',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'bulkImportInbox',
                             'title' => 'Inbox',
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
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => '',
                             'assetUploadPath' => '',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'folder',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'bulkImportArchive',
                             'title' => 'Archive',
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
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => '',
                             'assetUploadPath' => '',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'folder',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'bulkImportFailed',
                             'title' => 'Failed',
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
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 150,
                         'name' => 'Export Config',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Export Config',
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => '',
                             'assetUploadPath' => '',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'folder',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'bulkExportDirectory',
                             'title' => 'Bulk Export Directory',
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
                      )),
                    ),
                     'locked' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 200,
                     'layout' => NULL,
                     'name' => 'Product Bulk-Import Mapping',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Bulk-Import Mapping',
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
                         'labelWidth' => 180,
                         'layout' => '',
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:none;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => 500,
                             'assetUploadPath' => '/Settings',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
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
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'sampleProductBulkImportFile',
                             'title' => 'Sample Product Bulk-Import Xlsx FIle',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'float: left; margin: -5px 40px 0 0;padding-left:10px',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Button::__set_state(array(
                             'fieldtype' => 'button',
                             'handler' => '(function (button){
    // name of the field collection field in configuration class def
    // same name is used to call the function in configuration helper class to read XML files
    var mappingFieldName = \'importBulkProductMapping\';
    // combobox field name in field collection
    var comboName = \'sourceMappingProductBulkImport\';

    var tabpanel = Ext.getCmp("pimcore_panel_tabs");
    var activeTab = tabpanel.getActiveTab();
    var oId = activeTab.object.id;

    let xmlFileTextField = button.up().down(\'textfield\');
    let filePath = xmlFileTextField.getValue();

    if(filePath.trim() != ""){
        Ext.Ajax.request({
            url: "/app/default/add-fieldcols",
            params: {
                xmlFilePath: filePath,
                mappingFieldName: mappingFieldName,
                objectId: oId,
                comboName:comboName
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);
                let fileFound = response.fileFound;
                let validXml = response.validXML;

                if(response.success == true){
                    if(fileFound && validXml){
                        let sourceComponentName = comboName;
                        // columns which needs to be added
                        let notAddedColumns = response.notAddedColumns;

                        let fieldCollectionParentPanel = button.up().next();
                        let firstItemInPanel =  fieldCollectionParentPanel.items.items[0];

                        let count = 0;
                        // to add new row of field collection, we are
                        // clicking the add button with this code
                        for(key in  notAddedColumns){
                            // check if not item added to the panel (FC)
                            if(count == 0 && firstItemInPanel.componentCls == "x-toolbar"){
                                firstItemInPanel.items.items[0].el.dom.click();
                            }else{
                                let allAddedItems = fieldCollectionParentPanel.items.items;
                                let itemCount = allAddedItems.length;

                                // to get the add button on the panel,this will generate an issue if
                                // add is not allowed on fieldcollection. In that case the 0\'th element
                                // will not be add button
                                var addButton = allAddedItems[(itemCount -1)].down(\'toolbar\').items.items[0];
                                addButton.el.dom.click();
                            }
                            let allAddedItems = fieldCollectionParentPanel.items.items;
                            let combo = allAddedItems[(allAddedItems.length - 1)].down(\'[name=\'+sourceComponentName+\']\');
                            combo.setValue(key);
                            count++
                            // just to make the debugging easy
                            // window.aitems = allAddedItems;
                        }
                        if(count > 0){
                            Ext.MessageBox.alert(\'New mapping columns added.\',\'Total \'+count+\' mapping columns added.\');
                        }else{
                            Ext.MessageBox.alert(\'No new mapping column found.\',\'No new mapping column could be found in config.\');
                        }
                    }else{
                        if(!fileFound){
                            Ext.MessageBox.alert(\'File not found\',\'The mapped file was not found.\');
                        }else if(!validXml){
                            Ext.MessageBox.alert(\'XML not valid\',\'The mapped XML file is not valid.\');
                        }
                    }
                }

            }.bind(this),
            error: function (response) {
                console.log(response, "error")
            }.bind(this)
        });
    }

});',
                             'text' => 'Import Config',
                             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/import.svg',
                             'name' => 'Import Config Bulk Product',
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                         'fieldtype' => 'fieldcollections',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                         'allowedTypes' => 
                        array (
                          0 => 'MappingProductBulkImport',
                        ),
                         'lazyLoading' => true,
                         'maxItems' => 0,
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsed' => false,
                         'collapsible' => false,
                         'name' => 'importBulkProductMapping',
                         'title' => '<strong>Bulk Import Product Mapping</strong>',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 200,
                     'layout' => NULL,
                     'name' => 'Article Bulk-Import Mapping',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Article Bulk-Import Mapping',
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
                         'labelWidth' => 180,
                         'layout' => '',
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:none;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'fieldtype' => 'manyToOneRelation',
                             'width' => 500,
                             'assetUploadPath' => '/Settings',
                             'relationType' => true,
                             'queryColumnType' => 
                            array (
                              'id' => 'int(11)',
                              'type' => 'enum(\'document\',\'asset\',\'object\')',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
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
                             'lazyLoading' => true,
                             'classes' => 
                            array (
                            ),
                             'pathFormatterClass' => '',
                             'name' => 'sampleArticleBulkImportFile',
                             'title' => 'Sample Article Bulk-Import Xlsx FIle',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'float: left; margin: -5px 40px 0 0;padding-left:10px',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Button::__set_state(array(
                             'fieldtype' => 'button',
                             'handler' => '(function (button){
    // name of the field collection field in configuration class def
    // same name is used to call the function in configuration helper class to read XML files
    var mappingFieldName = \'importBulkArticleMapping\';
    // combobox field name in field collection
    var comboName = \'sourceMappingArticleBulkImport\';

    var tabpanel = Ext.getCmp("pimcore_panel_tabs");
    var activeTab = tabpanel.getActiveTab();
    var oId = activeTab.object.id;

    let xmlFileTextField = button.up().down(\'textfield\');
    let filePath = xmlFileTextField.getValue();

    if(filePath.trim() != ""){
        Ext.Ajax.request({
            url: "/app/default/add-fieldcols",
            params: {
                xmlFilePath: filePath,
                mappingFieldName: mappingFieldName,
                objectId: oId,
                comboName:comboName
            },
            success: function (response) {
                response = Ext.decode(response.responseText);
                console.log(response);
                let fileFound = response.fileFound;
                let validXml = response.validXML;

                if(response.success == true){
                    if(fileFound && validXml){
                        let sourceComponentName = comboName;
                        // columns which needs to be added
                        let notAddedColumns = response.notAddedColumns;

                        let fieldCollectionParentPanel = button.up().next();
                        let firstItemInPanel =  fieldCollectionParentPanel.items.items[0];

                        let count = 0;
                        // to add new row of field collection, we are
                        // clicking the add button with this code
                        for(key in  notAddedColumns){
                            // check if not item added to the panel (FC)
                            if(count == 0 && firstItemInPanel.componentCls == "x-toolbar"){
                                firstItemInPanel.items.items[0].el.dom.click();
                            }else{
                                let allAddedItems = fieldCollectionParentPanel.items.items;
                                let itemCount = allAddedItems.length;

                                // to get the add button on the panel,this will generate an issue if
                                // add is not allowed on fieldcollection. In that case the 0\'th element
                                // will not be add button
                                var addButton = allAddedItems[(itemCount -1)].down(\'toolbar\').items.items[0];
                                addButton.el.dom.click();
                            }
                            let allAddedItems = fieldCollectionParentPanel.items.items;
                            let combo = allAddedItems[(allAddedItems.length - 1)].down(\'[name=\'+sourceComponentName+\']\');
                            combo.setValue(key);
                            count++
                            // just to make the debugging easy
                            // window.aitems = allAddedItems;
                        }
                        if(count > 0){
                            Ext.MessageBox.alert(\'New mapping columns added.\',\'Total \'+count+\' mapping columns added.\');
                        }else{
                            Ext.MessageBox.alert(\'No new mapping column found.\',\'No new mapping column could be found in config.\');
                        }
                    }else{
                        if(!fileFound){
                            Ext.MessageBox.alert(\'File not found\',\'The mapped file was not found.\');
                        }else if(!validXml){
                            Ext.MessageBox.alert(\'XML not valid\',\'The mapped XML file is not valid.\');
                        }
                    }
                }

            }.bind(this),
            error: function (response) {
                console.log(response, "error")
            }.bind(this)
        });
    }

});',
                             'text' => 'Import Config',
                             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/import.svg',
                             'name' => 'Import Config Bulk Article',
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::__set_state(array(
                         'fieldtype' => 'fieldcollections',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Fieldcollection',
                         'allowedTypes' => 
                        array (
                          0 => 'MappingArticleBulkImport',
                        ),
                         'lazyLoading' => true,
                         'maxItems' => 0,
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsed' => false,
                         'collapsible' => false,
                         'name' => 'importBulkArticleMapping',
                         'title' => '<strong>Bulk Import Article Mapping</strong>',
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
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
          )),
          7 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 220,
             'layout' => NULL,
             'name' => 'Outbound API Config',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Outbound API Config',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'productsFolderPath',
                 'title' => 'Products Folder Path',
                 'tooltip' => 'This is the location where all the purged data will be created in csv format.',
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
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'priceFolderPath',
                 'title' => 'Price Folder Path',
                 'tooltip' => 'This is the location where all the purged data will be created in csv format.',
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
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 120,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => true,
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'priceWebserviceOffset',
                 'title' => 'Price Webservice Offset',
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
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 120,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => true,
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'priceWebserviceLimit',
                 'title' => 'Price Webservice Limit',
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
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 120,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => true,
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'productWebserviceLimit',
                 'title' => 'Product Webservice Limit',
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
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
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
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'sampleOutboundImportExcelFile',
                 'title' => 'Sample Outbound Import Excel File',
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
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'logRecordFolderPath',
                 'title' => 'Log Record FolderPath',
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
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => true,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'logFileFolderPath',
                 'title' => 'Log FIle Folder Path',
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
          )),
          8 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'name' => 'CLI Commands',
             'type' => NULL,
             'region' => NULL,
             'title' => 'CLI Commands',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyObjectRelation::__set_state(array(
                 'allowedClassId' => 'CliCommand',
                 'visibleFields' => 'title',
                 'columns' => 
                array (
                  0 => 
                  array (
                    'type' => 'bool',
                    'position' => 1,
                    'key' => 'enabled',
                    'id' => 'extModel8752-1',
                    'label' => 'Enabled',
                  ),
                ),
                 'fieldtype' => 'advancedManyToManyObjectRelation',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ObjectMetadata[]',
                 'enableBatchEdit' => false,
                 'allowMultipleAssignments' => false,
                 'width' => '',
                 'height' => '',
                 'maxItems' => '',
                 'queryColumnType' => 'text',
                 'relationType' => true,
                 'optimizedAdminLoading' => false,
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'commandsSequence',
                 'title' => 'Commands Execution Sequence',
                 'tooltip' => 'The commands will run in the order of the list',
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
                 'columnKeys' => 
                array (
                  0 => 'enabled',
                ),
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'fieldtype' => 'select',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'Products Data Import',
                    'value' => 21,
                  ),
                  1 => 
                  array (
                    'key' => 'Generate Verions',
                    'value' => 20,
                  ),
                  2 => 
                  array (
                    'key' => 'Associate Ecom To New Products',
                    'value' => 19,
                  ),
                  3 => 
                  array (
                    'key' => 'Set Ecom AFU Based On Dates',
                    'value' => 18,
                  ),
                  4 => 
                  array (
                    'key' => 'Objects Fulltext Indexing Command',
                    'value' => 17,
                  ),
                  5 => 
                  array (
                    'key' => '<b>Main Command</b>',
                    'value' => 16,
                  ),
                  6 => 
                  array (
                    'key' => 'Products Data Export',
                    'value' => 12,
                  ),
                  7 => 
                  array (
                    'key' => 'Import Translation Job',
                    'value' => 10,
                  ),
                  8 => 
                  array (
                    'key' => 'Images download',
                    'value' => 8,
                  ),
                  9 => 
                  array (
                    'key' => 'Image Feed',
                    'value' => 7,
                  ),
                  10 => 
                  array (
                    'key' => 'Host Brand XML Data Loader',
                    'value' => 6,
                  ),
                  11 => 
                  array (
                    'key' => 'Enrich Data from Host Brand Loader',
                    'value' => 5,
                  ),
                  12 => 
                  array (
                    'key' => 'Attributes Change Logs',
                    'value' => 4,
                  ),
                  13 => 
                  array (
                    'key' => 'AIMS Products Job',
                    'value' => 2,
                  ),
                  14 => 
                  array (
                    'key' => 'AIMS Price Job',
                    'value' => 1,
                  ),
                ),
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProvider',
                 'optionsProviderData' => '',
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'name' => 'attributeChangeLogsCommand',
                 'title' => 'Attribute Change Logs Command',
                 'tooltip' => 'This command is being executed after translation import process.',
                 'mandatory' => true,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => true,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
              )),
            ),
             'locked' => false,
          )),
          9 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 300,
             'layout' => NULL,
             'name' => 'Email Notifications',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Email Notifications',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateDefault',
                 'title' => 'Template (Default)',
                 'tooltip' => 'Select template for default notification.',
                 'mandatory' => true,
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
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateAimsProduct',
                 'title' => 'Template (AIMS)',
                 'tooltip' => 'Select template for AIMS notification.',
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
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateAimsPrice',
                 'title' => 'Template (AIMS Price)',
                 'tooltip' => 'Select template for Aims Price notification.',
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
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateHb',
                 'title' => 'Template (Host Brand Enrich)',
                 'tooltip' => 'Select template for Host Brand Enrich notification.',
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
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateHbLoader',
                 'title' => 'Template (Host Brand Loader)',
                 'tooltip' => 'Select template for Host Brand Loader notification.',
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
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateAssets',
                 'title' => 'Template (Asset)',
                 'tooltip' => 'Select template for Assets notification.',
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
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateAssetMapping',
                 'title' => 'Template (Asset Mapping)',
                 'tooltip' => 'Select template for Assets Mapping notification.',
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
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateAssetDownload',
                 'title' => 'Template (Asset Download)',
                 'tooltip' => 'Select template for Assets Download notification.',
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
              8 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateAssetsAFU',
                 'title' => 'Template (Asset AFU)',
                 'tooltip' => 'Select template for Assets AFU notification.',
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
              9 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateTranslation',
                 'title' => 'Template (Translation)',
                 'tooltip' => 'Select template for Translation notification.',
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
              10 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateExport',
                 'title' => 'Template (Export)',
                 'tooltip' => 'Select template for Export notification.',
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
              11 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateDailyConsumption',
                 'title' => 'Template (Daily Consumption)',
                 'tooltip' => 'Select template for Daily consumption notification.',
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
              12 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateException',
                 'title' => 'Template (Exception)',
                 'tooltip' => 'Select template for Exception notification.',
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
              13 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateArchivedXMLFilesDeletion',
                 'title' => 'Template (XML Deletion)',
                 'tooltip' => 'Select template for XML Deletion notification.',
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
              14 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateIncomingDataLogsArchival',
                 'title' => 'Template (Archive Incoming Data Log)',
                 'tooltip' => 'Select template for Archive Incoming Data Log notification.',
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
              15 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateLoadersArchival',
                 'title' => 'Template (Archive Loader)',
                 'tooltip' => 'Select template for Archive Loader notification.',
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
              16 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => true,
                 'documentTypes' => 
                array (
                  0 => 
                  array (
                    'documentTypes' => 'email',
                  ),
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'notificationTemplateBulkImport',
                 'title' => 'Template (Bulk Import)',
                 'tooltip' => 'Select template for Bulk Import notification.',
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
          )),
          10 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 280,
             'layout' => NULL,
             'name' => 'Archival',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Archival',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 100,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => true,
                 'unsigned' => false,
                 'minValue' => 1,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'archiveIncomingDataLogsBeforeXDays',
                 'title' => 'Archive Incoming Data Logs Before x Days',
                 'tooltip' => 'Archive Incoming Data Logs Before x Days',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 100,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => true,
                 'unsigned' => false,
                 'minValue' => 1,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'deleteArchivedXMLFilesBeforeXDays',
                 'title' => 'Archive XML Files Before x Days',
                 'tooltip' => 'Archive XML Files Before x Days',
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
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => '',
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'queryColumnType' => 
                array (
                  'id' => 'int(11)',
                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                ),
                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                 'objectsAllowed' => false,
                 'assetsAllowed' => true,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'lazyLoading' => true,
                 'classes' => 
                array (
                ),
                 'pathFormatterClass' => '',
                 'name' => 'archiveFolderPath',
                 'title' => 'Archive Folder Path',
                 'tooltip' => 'This is the location where all the purged data will be created in csv format.',
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
          )),
        ),
         'locked' => false,
      )),
    ),
     'locked' => false,
  )),
   'icon' => '/Icons/config.png',
   'previewUrl' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
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
   'dao' => NULL,
));

