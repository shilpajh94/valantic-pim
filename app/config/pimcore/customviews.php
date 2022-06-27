<?php

return [
    'views' => [
        /** custom view for conveyor solution project **/
        [
            'treetype' => 'document',
            'name' => 'Catalog Documents',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/pdf.svg',
            'id' => 'cs_catalog_cms',
            'rootfolder' => '/ConveyorBeltSolutions/Catalogs',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '11',
            'expanded' => true,
            'where' => ''
        ],
        [
            'treetype' => 'document',
            'name' => 'Email Templates',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/email.svg',
            'id' => 'cs_workflow_templates_cms',
            'rootfolder' => '/ConveyorBeltSolutions/WorkflowEmailTemplates',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '11',
            'expanded' => true,
            'where' => '',
            'treeContextMenu' => [                          // hide the "Add document" tree context menu
                'document' => [
                    'items' => [
                        'add' => 0,
                        'addPrintPage' => 0,
                        'addSnippet' => 0,                                      // hide "Add Snippet"
                        'addLink' => 0,                                         // hide "Add Link"
                        'addEmail' => 0,                                        // hide "Add Email"
                        'addNewsletter' => 0,                                   // hide "Add Newsletter"
                        'addHardlink' => 0,                                     // hide "Add Hardlink"
                        'addFolder' => 0,                                       // hide "Add Folder"
                        'paste' => 0,                                           // hide all the "Paste" options
                        'pasteCut' => 0,                                        // hide "Paste Cut element"
                        'copy' => 0,                                            // hide "Copy"
                        'cut' => 0,                                             // hide "Cut"
                        'rename' => 0,                                          // hide "Rename"
                        'unpublish' => 0,                                       // hide "Unpublish"
                        'publish' => 0,                                         // hide "Publish"
                        'delete' => 0,                                          // hide "Delete"
                        'open' => 0,                                            // hide "Open"
                        'convert' => 0,                                         // hide "Convert"
                        'searchAndMove' => 0,                                   // hide "Search And Move"
                        'useAsSite' => 0,                                       // hide "Use As Site"
                        'editSite' => 0,                                        // hide "Edit Site"
                        'removeSite' => 0,                                      // hide "Remove Site"
                        'lock' => 0,                                            // hide "Lock"
                        'unlock' => 0,                                          // hide "Unlock"
                        'lockAndPropagate' => 0,                                // hide "UnlockAndPropagate"
                        'unlockAndPropagate' => 0,                              // hide "Lock And Propagate"
                        'reload' => 1      
                    ]
                ]
            ]
        ],
        [
            'treetype' => 'asset',
            'name' => 'External Assets',
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/edit_image.svg',
            'id' => 'cs_asset_external',
            'rootfolder' => '/Contitech_ConveyorSolution/External Assets',
            'showroot' => true,
            'position' => 'left',
            'sort' => '5',
            'expanded' => false
        ],
        [
            'treetype' => 'asset',
            'name' => 'Internal Assets',
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/edit_image.svg',
            'id' => 'cs_asset_internal',
            'rootfolder' => '/Contitech_ConveyorSolution/Internal Assets',
            'showroot' => true,
            'position' => 'left',
            'sort' => '5',
            'expanded' => false
        ],
        [
            'treetype' => 'asset',
            'name' => 'External Assets',
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/edit_image.svg',
            'id' => 'cs_asset_products',
            'rootfolder' => '/Contitech_ConveyorSolution/Product Assets',
            'showroot' => true,
            'position' => 'left',
            'sort' => '5',
            'expanded' => false,
            'treeContextMenu' => [
                'asset' => [
                    'items' => [
                        'add' => [
//                            "hidden" => 1,                                    // hide "Add asset" menu (including subentries)
                            'items' => [
//                                'upload' => 0,                                  // hide "Upload"
//                                "uploadCompatibility" => 0,                     // hide "Upload Compatibility Mode"
//                                "uploadZip" => 0,                               // hide "Upload ZIP Archive"
//                                "importFromServer" => 0,                        // don't show "Import from Server"
//                                'uploadFromUrl' => 0                            // hide "Upload From URL"
                            ]
                        ],
                        'addFolder' => 0,                                       // show (!) "Add Folder" (shown by default anyway)
                        'rename' => 0,                                          // hide "Rename"
//                        "copy" => 0,                                            // hide "Copy"
//                        "cut" => 0,                                             // hide "Cut"
                        'paste' => 0,                                           // hide "Paste"
                        'pasteCut' => 0,                                        // hide "Paste cut element"
                        'delete' => 0,                                          // hide "Delete"
                        'searchAndMove' => 0,                                   // hide "Search And Move"
                        'lock' => 0,                                            // hide "Lock"
                        'unlock' => 0,                                          // hide "Unlock"
                        'lockAndPropagate' => 0,                                // hide "Lock and propagate"
                        'unlockAndPropagate' => 0,                              // hide "Unlock and propagate"
                        'reload' => [                                           // show reload (shown by default anyway)
                            'hidden' => false
                        ]
                    ]
                ]
            ]
        ],
        [
            'treetype' => 'object',
            'name' => 'Products Data',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/neutral_trading.svg',
            'id' => 'cs_dataobject_products_data',
            'rootfolder' => '/Contitech_ConveyorSolution/Products',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '10',
            'expanded' => false,
            'where' => '',
            'treeContextMenu' => [                          // hide the "Add document" tree context menu
                'object' => [
                    'items' => [
                        'publish' => 0,                                         // hide "Publish"
                        'unpublish' => 0,                                       // hide "Unpublish"
                        //'delete' => 0,  
                        'searchAndMove' => 0, 
                        'unlock' => 0,            
                        'unlockAndPropagete' => 0
                    ]
                ]
            ]
        ],
        [
            'treetype' => 'object',
            'name' => 'Catalogs Objects',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-reading.svg',
            'id' => 'cs_dataobject_catalogs_data',
            'rootfolder' => '/Contitech_ConveyorSolution/Catalog Objects',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '10',
            'expanded' => false,
            'where' => '',
        ],
        [
            'treetype' => 'object',
            'name' => 'Master Data',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/negative_dynamic.svg',
            'id' => 'cs_dataobject_master_data',
            'rootfolder' => '/Contitech_ConveyorSolution/Master Data',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '10',
            'expanded' => false,
            'where' => '',
        ],
        [
            'treetype' => 'asset',
            'name' => 'Product Data Import Module',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/negative_dynamic.svg',
            'id' => 'cs_product_data_import_module',
            'rootfolder' => '/Product Data Import Module',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '10',
            'expanded' => false,
            'where' => '',
        ],
        /** custom view for conveyor solution project **/

/** custom view for ptgeu project **/

        [
            'treetype' => 'asset',
            'name' => 'External Assets',
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/edit_image.svg',
            'id' => 'ptgeu_asset_products',
            'rootfolder' => '/PTG_EU',
            'showroot' => true,
            'position' => 'left',
            'sort' => '5',
            'expanded' => false,
            'treeContextMenu' => [
                'asset' => [
                    'items' => [
                        'add' => [
//                            "hidden" => 1,                                    // hide "Add asset" menu (including subentries)
                            'items' => [
//                                'upload' => 0,                                  // hide "Upload"
//                                "uploadCompatibility" => 0,                     // hide "Upload Compatibility Mode"
//                                "uploadZip" => 0,                               // hide "Upload ZIP Archive"
//                                "importFromServer" => 0,                        // don't show "Import from Server"
//                                'uploadFromUrl' => 0                            // hide "Upload From URL"
                            ]
                        ],
                        'addFolder' => 0,                                       // show (!) "Add Folder" (shown by default anyway)
                        'rename' => 0,                                          // hide "Rename"
//                        "copy" => 0,                                            // hide "Copy"
//                        "cut" => 0,                                             // hide "Cut"
                        'paste' => 0,                                           // hide "Paste"
                        'pasteCut' => 0,                                        // hide "Paste cut element"
                        'delete' => 0,                                          // hide "Delete"
                        'searchAndMove' => 0,                                   // hide "Search And Move"
                        'lock' => 0,                                            // hide "Lock"
                        'unlock' => 0,                                          // hide "Unlock"
                        'lockAndPropagate' => 0,                                // hide "Lock and propagate"
                        'unlockAndPropagate' => 0,                              // hide "Unlock and propagate"
                        'reload' => [                                           // show reload (shown by default anyway)
                            'hidden' => false
                        ]
                    ]
                ]
            ]
        ],
        [
            'treetype' => 'object',
            'name' => 'Products Data',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/neutral_trading.svg',
            'id' => 'ptgeu_dataobject_products_data',
            'rootfolder' => '/PTG_EU/Products',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '10',
            'expanded' => false,
            'where' => '',
            'treeContextMenu' => [                          // hide the "Add document" tree context menu
                'object' => [
                    'items' => [
                        'publish' => 0,                                         // hide "Publish"
                        'unpublish' => 0,                                       // hide "Unpublish"
                        //'delete' => 0,  
                        'searchAndMove' => 0, 
                        'unlock' => 0,            
                        'unlockAndPropagete' => 0
                    ]
                ]
            ]
        ],

        [
            'treetype' => 'document',
            'name' => 'Email Templates',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/email.svg',
            'id' => 'ptgeu_workflow_templates_cms',
            'rootfolder' => '/PTG_EU/WorkflowEmailTemplates',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '11',
            'expanded' => true,
            'where' => '',
            'treeContextMenu' => [                          // hide the "Add document" tree context menu
                'document' => [
                    'items' => [
                        'add' => 0,
                        'addPrintPage' => 0,
                        'addSnippet' => 0,                                      // hide "Add Snippet"
                        'addLink' => 0,                                         // hide "Add Link"
                        'addEmail' => 0,                                        // hide "Add Email"
                        'addNewsletter' => 0,                                   // hide "Add Newsletter"
                        'addHardlink' => 0,                                     // hide "Add Hardlink"
                        'addFolder' => 0,                                       // hide "Add Folder"
                        'paste' => 0,                                           // hide all the "Paste" options
                        'pasteCut' => 0,                                        // hide "Paste Cut element"
                        'copy' => 0,                                            // hide "Copy"
                        'cut' => 0,                                             // hide "Cut"
                        'rename' => 0,                                          // hide "Rename"
                        'unpublish' => 0,                                       // hide "Unpublish"
                        'publish' => 0,                                         // hide "Publish"
                        'delete' => 0,                                          // hide "Delete"
                        'open' => 0,                                            // hide "Open"
                        'convert' => 0,                                         // hide "Convert"
                        'searchAndMove' => 0,                                   // hide "Search And Move"
                        'useAsSite' => 0,                                       // hide "Use As Site"
                        'editSite' => 0,                                        // hide "Edit Site"
                        'removeSite' => 0,                                      // hide "Remove Site"
                        'lock' => 0,                                            // hide "Lock"
                        'unlock' => 0,                                          // hide "Unlock"
                        'lockAndPropagate' => 0,                                // hide "UnlockAndPropagate"
                        'unlockAndPropagate' => 0,                              // hide "Lock And Propagate"
                        'reload' => 1      
                    ]
                ]
            ]
        ],
    ]
];
