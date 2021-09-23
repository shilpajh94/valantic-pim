<?php

return [
    'default' => [                                              // this is the config for the default view
        'iconCls' => 'pimcore_icon_perspective',
        'elementTree' => [
            [
                'type' => 'documents',                          // document tree
                'position' => 'left',
                'expanded' => false,                            //  there can be only one expanded view on each side
                'hidden' => false,
                'sort' => -3                                    // trees with lower values are shown first
            ],
            [
                'type' => 'assets',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => -2
            ],
            [
                'type' => 'objects',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => -1
            ]

        ],
        'dashboards' => [                                  // this is the standard setting for the welcome screen
            'predefined' => [
                'welcome' => [                             // internal key of the dashboard
                    'positions' => [
                        [                                  // left column
                            [
                                'id' => 1,
                                'type' => 'pimcore.layout.portlets.modificationStatistic',
                                'config' => null                // additional config
                            ],
                            [
                                'id' => 2,
                                'type' => 'pimcore.layout.portlets.modifiedAssets',
                                'config' => null
                            ]
                        ],
                        [
                            [
                                'id' => 3,
                                'type' => 'pimcore.layout.portlets.modifiedObjects',
                                'config' => null
                            ],
                            [
                                'id' => 4,
                                'type' => 'pimcore.layout.portlets.modifiedDocuments',
                                'config' => null
                            ]
                        ]
                    ]
                ]
            ]
        ]

    ],
    'CS_ApplicationAdmin' => [
        'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/biohazard.svg',
        'elementTree' => [
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 0,
                'id' => 'cs_catalog_cms',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 1,
                'id' => 'cs_workflow_templates_cms',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 2,
                'id' => 'cs_asset_catalogs',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 3,
                'id' => 'cs_asset_internal',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 4,
                'id' => 'cs_asset_products',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 5,
                'id' => 'cs_dataobject_products_data',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 6,
                'id' => 'cs_dataobject_catalogs_data',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 7,
                'id' => 'cs_dataobject_master_data',
            ]
        ]
    ],
    'CS_ProductManager' => [
        'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/biohazard.svg',
        'elementTree' => [
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 0,
                'id' => 'cs_catalog_cms',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 2,
                'id' => 'cs_asset_catalogs',
            ],
//            [
//                'type' => 'customview',
//                'position' => 'left',
//                'expanded' => false,
//                'hidden' => false,
//                'sort' => 3,
//                'id' => 'cs_asset_internal',
//            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 4,
                'id' => 'cs_asset_products',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 5,
                'id' => 'cs_dataobject_products_data',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 6,
                'id' => 'cs_dataobject_catalogs_data',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 7,
                'id' => 'cs_dataobject_master_data',
            ]
        ]
    ],
    'CS_MarCom' => [
        'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/biohazard.svg',
        'elementTree' => [
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 0,
                'id' => 'cs_catalog_cms',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 2,
                'id' => 'cs_asset_catalogs',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 3,
                'id' => 'cs_asset_internal',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 4,
                'id' => 'cs_asset_products',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 5,
                'id' => 'cs_dataobject_products_data',
            ],
//            [
//                'type' => 'customview',
//                'position' => 'left',
//                'expanded' => false,
//                'hidden' => false,
//                'sort' => 6,
//                'id' => 'cs_dataobject_catalogs_data',
//            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 7,
                'id' => 'cs_dataobject_master_data',
            ]
        ]
    ],
    
    'CS_Editor' => [
        'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/biohazard.svg',
        'elementTree' => [
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 0,
                'id' => 'cs_catalog_cms',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 2,
                'id' => 'cs_asset_catalogs',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 3,
                'id' => 'cs_asset_internal',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 4,
                'id' => 'cs_asset_products',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 5,
                'id' => 'cs_dataobject_products_data',
            ],
            [
                'type' => 'customview',
                'position' => 'left',
                'expanded' => false,
                'hidden' => false,
                'sort' => 7,
                'id' => 'cs_dataobject_master_data',
            ]
        ]
    ]
];
