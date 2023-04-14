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
                        'unlockAndPropagete' => 0,
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
            'name' => 'Product Assets',
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/edit_image.svg',
            'id' => 'contitech_ptgeu_asset_products',
            'rootfolder' => '/Contitech_PTGEU/Product Assets',
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
                        'addFolder' => 1,                                       // show (!) "Add Folder" (shown by default anyway)
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
            'treetype' => 'asset',
            'name' => 'Catalog Images',
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/edit_image.svg',
            'id' => 'contitech_ptgeu_catalog_images',
            'rootfolder' => '/Contitech_PTGEU/CatalogImages',
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
                               'upload' => 1,                                  // hide "Upload"
                               "uploadCompatibility" => 1,                     // hide "Upload Compatibility Mode"
                               "uploadZip" => 1,                               // hide "Upload ZIP Archive"
                               "importFromServer" => 1,                        // don't show "Import from Server"
                               'uploadFromUrl' => 1                            // hide "Upload From URL"
                            ]
                        ],
                        'addFolder' => 1,                                       // show (!) "Add Folder" (shown by default anyway)
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
            'name' => 'Products',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/neutral_trading.svg',
            'id' => 'contitech_ptgeu_product_objects',
            'rootfolder' => '/Contitech_PTGEU/Products',
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
                        'delete' => 0,  
                        'searchAndMove' => 0, 
                        'unlock' => 0,            
                        'unlockAndPropagete' => 0,
                        'importCsv' => 0

                    ]
                ]
            ]
        ],

        [
            'treetype' => 'object',
            'name' => 'Catalog Objects',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/neutral_trading.svg',
            'id' => 'contitech_ptgeu_catalog_objects',
            'rootfolder' => '/Contitech_PTGEU/Catalog Objects',
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
                        'delete' => 0,  
                        'searchAndMove' => 0, 
                        'unlock' => 0,            
                        'unlockAndPropagete' => 0,
                        'importCsv' => 0
                    ]
                ]
            ]
        ],

        [
            'treetype' => 'object',
            'name' => 'Master List',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/negative_dynamic.svg',
            'id' => 'contitech_ptgeu_master_list',
            'rootfolder' => '/Contitech_PTGEU/Master List',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '10',
            'expanded' => false,
            'where' => '',
            'treeContextMenu' => [                          // hide the "Add document" tree context menu
                'object' => [
                    'items' => [
                        'importCsv' => 0
                    ]
                ]
            ]
        ],

        [
            'treetype' => 'object',
            'name' => 'Material Master List',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/negative_dynamic.svg',
            'id' => 'contitech_ptgeu_material_master_list',
            'rootfolder' => '/Contitech_PTGEU/MaterialMaster',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '10',
            'expanded' => false,
            'where' => '',
            'treeContextMenu' => [                          // hide the "Add document" tree context menu
                'object' => [
                    'items' => [
                        'importCsv' => 0
                    ]
                ]
            ]

        ],

        [
            'treetype' => 'document',
            'name' => 'Catalog',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/email.svg',
            'id' => 'contitech_ptgeu_catalog_cms',
            'rootfolder' => '/Contitech_PTGEU/Catalog',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '11',
            'expanded' => true,
            'where' => '',
            'treeContextMenu' => [                          // hide the "Add document" tree context menu
                'document' => [
                    'items' => [
                        'add' => 1,
                        'addPrintPage' => 1,
                        'addSnippet' => 0,                                      // hide "Add Snippet"
                        'addLink' => 0,                                         // hide "Add Link"
                        'addEmail' => 0,                                        // hide "Add Email"
                        'addNewsletter' => 0,                                   // hide "Add Newsletter"
                        'addHardlink' => 0,                                     // hide "Add Hardlink"
                        'addFolder' => 1,                                       // hide "Add Folder"
                        'paste' => 1,                                           // hide all the "Paste" options
                        'pasteCut' => 0,                                        // hide "Paste Cut element"
                        'copy' => 1,                                            // hide "Copy"
                        'cut' => 0,                                             // hide "Cut"
                        'rename' => 0,                                          // hide "Rename"
                        'unpublish' => 1,                                       // hide "Unpublish"
                        'publish' => 1,                                         // hide "Publish"
                        'delete' => 1,                                          // hide "Delete"
                        'open' => 1,                                            // hide "Open"
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



        /** custom view for ifseu project **/
        
        [
            'treetype' => 'asset',
            'name' => 'Product Assets',
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/edit_image.svg',
            'id' => 'contitech_ifseu_asset_products',
            'rootfolder' => '/Contitech_IFS_EMEA/Product Assets',
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
                        'addFolder' => 1,                                       // show (!) "Add Folder" (shown by default anyway)
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
            'name' => 'Master Data',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/negative_dynamic.svg',
            'id' => 'contitech_ifseu_master_data',
            'rootfolder' => '/Contitech_IFS_EMEA/Master Data',
            'showroot' => true,
            'classes' => '',
            'position' => 'left',
            'sort' => '10',
            'expanded' => false,
            'where' => '',
            'treeContextMenu' => [                          // hide the "Add document" tree context menu
                'object' => [
                    'items' => [
                        'importCsv' => 0
                    ]
                ]
            ]
        ],

        [
            'treetype' => 'object',
            'name' => 'Products',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/neutral_trading.svg',
            'id' => 'contitech_ifseu_product_objects',
            'rootfolder' => '/Contitech_IFS_EMEA/Products',
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
                        'delete' => 0,  
                        'searchAndMove' => 0, 
                        'unlock' => 0,            
                        'unlockAndPropagete' => 0,
                        'importCsv' => 0

                    ]
                ]
            ]
        ],

        [
            'treetype' => 'object',
            'name' => 'Material Master',
            'condition' => null,
            'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/neutral_trading.svg',
            'id' => 'contitech_ifseu_material_master_list',
            'rootfolder' => '/Contitech_IFS_EMEA/MaterialMaster',
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
                        'delete' => 0,  
                        'searchAndMove' => 0, 
                        'unlock' => 0,            
                        'unlockAndPropagete' => 0,
                        'importCsv' => 0

                    ]
                ]
            ]
        ],
    ]
];
