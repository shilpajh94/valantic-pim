/* global Ext */

/**
 * Pimcore
 *
 * This source file is available under two different licenses: - GNU General
 * Public License version 3 (GPLv3) - Pimcore Enterprise License (PEL) Full
 * copyright and license information is available in LICENSE.md which is
 * distributed with this source code.
 *
 * @copyright Copyright (c) 2009-2016 pimcore GmbH ( http://www.pimcore.org)
 * @license http://www.pimcore.org/license GPLv3 and PEL
 *
 * @desc This file is used for Mapping view panel
 */

pimcore.registerNS("pimcore.plugin.channels.item");
pimcore.plugin.channels.item = Class
        .create({
            // Initialize item panel
            initialize: function (data, parentPanel) {
                this.parentPanel = parentPanel;
                this.data = data;
                this.mappingData = '';
                this.fieldData = null;
                this.gridcolumndata = null;
                this.noOfItems = null;
                this.currentElements = [];
                this.currentElementCount = 0;
                this.classnameUsed = null;
                this.config = null;
                this.response = false;
                //this.activeCheckValue = data.active;
                this.isAdmin = data.isAdmin;
                this.isRetailer = data.isRetailer;
                this.thresholdValue = data.thresholdValue;
                this.qualityCheck = data.qualityCheck;
                this.share = data.shareWithUser;
                this.downloadTypes = data.downloadTypes;
                // this.activeFtpFileType = data.ftpFileType;
                this.metadata = data.assetMetadata;
                this.thumbnail = data.thumbnail;
                this.creationDate = data.creationDate;
                this.modificationDate = data.modificationDate;
                this.createdBy = data.createdBy;
                this.modifiedBy = data.modifiedBy;
                this.downloadStats = data.downloadStats;
                this.retailerClassExists = data.retailerClassExists;
                this.defaultLanguage = data.defaultLanguage;
                this.objectTypeValue = data.objectTypeValue;
                this.thresholdFieldNeeded = data.thresholdFieldNeeded;
                this.qualityCheckNeeded = data.qualityCheckNeeded;
                this.qualityFieldName = data.qualityFieldName;

                this.addLayout();
            },
            // Add item layout
            addLayout: function () {

                var mainScope = this;

                var id = this.data.id;
                this.channelId = id;

                this.metadata = this.data.assetMetadata;
                this.thumbnail = this.data.thumbnail;
                this.downloadStats = this.data.downloadStats;
                this.objectTypeValue = this.data.objectTypeValue;

                if (this.retailerClassExists) {
                    this.isRetailer = this.data.isRetailer;
                } else {
                    this.isRetailer = false;
                }


                this.activeCheckbox = Ext.create('Ext.form.field.Checkbox', {
                    boxLabel: 'Active',
                    checked: this.activeCheckValue,
                    hidden: true
                });

                this.shareCheckBox = Ext.create('Ext.form.field.Checkbox', {
                    boxLabel: 'Share',
                    checked: this.data.shareWithUser,
                    disabled: this.isRetailer,
                    hidden: !(this.retailerClassExists),
                });


                if (this.data.retailer) {
                    this.retailerComboValue = this.data.retailer;
                } else {
                    this.retailerComboValue = "";

                }



                if (this.data.language) {
                    this.languageComboValue = this.data.language;
                } else {
                    this.languageComboValue = this.defaultLanguage;

                }



                if (this.data.objectTypeValue) {
                    this.objectTypeValue = this.data.objectTypeValue;
                } else {
                    this.objectTypeValue = "variant";
                }


                //Language combo start 
                var availableLanguage = new Ext.data.JsonStore({
                    proxy: {
                        type: 'ajax',
                        url: '/admin/DistributionHub/channel/get-available-languages',
                        reader: {
                            type: 'json',
                            rootProperty: 'languages'
                        }
                    },
                    fields: ["name", "value"]
                });

                availableLanguage.load();

                this.languageCombo = Ext.create('Ext.form.ComboBox', {
                    fieldLabel: 'Select Language',
                    labelWidth: 120,
                    autoSelect: true,
                    store: availableLanguage,
                    queryMode: 'local',
                    editable: false,
                    displayField: 'name',
                    valueField: 'value',
                    width: 225,
                    value: this.languageComboValue
                });
                //Language combo end 


                //Download Type combo start 
                var objectTypeStore = Ext.create('Ext.data.Store', {
                    fields: ['name', 'value'],
                    data: [
//                        {"name": "Base Products", "value": "object"},
                        {"name": t("Variants"), "value": "variant"},
                        {"name": t("All Products"), "value": "objectAndVariant"}
                    ]
                });

                //objectType.load();               

                this.objectTypeCombo = Ext.create('Ext.form.ComboBox', {
                    fieldLabel: 'Select Object Type',
                    labelWidth: 120,
                    autoSelect: true,
                    store: objectTypeStore,
                    queryMode: 'local',
                    editable: false,
                    displayField: 'name',
                    valueField: 'value',
                    width: 270,
                    value: this.objectTypeValue
                });
                //Download Type combo end 

                if (this.retailerClassExists) {
                    var retailerParams = {
                        retailerId: this.retailerComboValue
                    }
                }


                var thumbnailComboStore = new Ext.data.JsonStore({
                    storeId: 'myStore',
                    autoLoad: false,
                    proxy: {
                        type: 'ajax',
                        url: '/admin/DistributionHub/channel/get-available-thumbnails',
                        reader: {
                            type: 'json',
                            rootProperty: 'thumbnails'
                        },
                        extraParams: retailerParams
                    },
                    fields: ["id", "name", "classUsed"]

                });

                thumbnailComboStore.load();

                this.thumbnailCombo = Ext.create('Ext.form.field.Tag', {
                    fieldLabel: 'Select Transformation(s)',
                    store: thumbnailComboStore,
                    autoLoad: false,
                    queryMode: 'local',
                    forceSelection: false,
                    displayField: 'name',
                    valueField: 'id',
                    value: (this.thumbnail ? this.thumbnail : ''),
                    labelWidth: 150,
                    width: 500
                });

                // The data store containing the list of threshold values
                var thresholdValues = Ext.create('Ext.data.Store', {
                    fields: ['abbr', 'name'],
                    data: [
                        {"key": "", "display": t("No Threshold")},
                        {"key": "10", "display": "10"},
                        {"key": "20", "display": "20"},
                        {"key": "30", "display": "30"},
                        {"key": "40", "display": "40"},
                        {"key": "50", "display": "50"},
                        {"key": "60", "display": "60"},
                        {"key": "70", "display": "70"},
                        {"key": "80", "display": "80"},
                        {"key": "90", "display": "90"},
                        {"key": "100", "display": "100"}
                    ]
                });

                this.thresholdValueField = Ext.create('Ext.form.field.ComboBox', {
                    fieldLabel: t('Completeness Threshold'),
                    name: 'completenessThreshold',
                    store: thresholdValues,
                    labelWidth: 100,
                    queryMode: 'local',
                    displayField: 'display',
                    valueField: 'key',
                    value: this.thresholdValue,
                    maxValue: 100,
                    minValue: 0,
                    anchor: '100%',
                    hidden: !this.thresholdFieldNeeded,
                    listeners: {
                        change: function (nf, evt) {
                            mainScope.refreshGrid();

                        },
                        specialkey: function (nf, evt) {
                            if (evt.getKey() == "13") {
                                mainScope.refreshGrid();
                            }
                        }
                    }
                });
                this.qualityCheckField = Ext.create('Ext.form.Checkbox', {
                    name: 'qualityCheck',
                    fieldLabel: t('Quality Approved'),
                    value: this.qualityCheck,
                    checked: this.qualityCheck,
                    hidden: !this.qualityCheckNeeded,
                    labelWidth: 100,
                    width: 200,
                    labelSeparator: ' :',
                    labelAlign: 'left',
                    labelCls: "qualityLabel",
                });

                // available retailers store -start 

                if (this.retailerClassExists) {
                    var availableRetailers = new Ext.data.JsonStore({
                        proxy: {
                            type: 'ajax',
                            url: '/admin/DistributionHub/channel/get-available-retailers',
                            reader: {
                                type: 'json',
                                rootProperty: 'retailers'
                            }
                        },
                        fields: ["name", "value"]
                    });
                    availableRetailers.load();

                    this.retailerCombo = Ext.create('Ext.form.ComboBox', {
                        fieldLabel: 'Select Retailer',
                        store: availableRetailers,
                        forceSelection: true,
                        displayField: 'name',
                        valueField: 'value',
                        valueNotFoundText: "Empty",
                        queryMode: 'local',
                        editable: false,
                        autoSelect: true,
                        disabled: this.isRetailer,
                        //hidden: this.isRetailer,
                        value: this.retailerComboValue,
                        listeners: {
                            select: function (record, opt) {
//                                this.thumbnailCombo.clearValue();
//                                thumbnailComboStore.load({
//                                    params: {retailerId: record.getValue()}
//                                });
//                                this.thumbnailCombo.bindStore(thumbnailComboStore);

                            }.bind(this)
                        }
                    });
                    // available retailers store -end 

                }
                //download type start 
                var downloadTypes = new Ext.data.JsonStore({
                    proxy: {
                        type: 'ajax',
                        url: '/admin/DistributionHub/channel/get-available-download-types',
                        reader: {
                            type: 'json',
                            rootProperty: 'downloadTypes'
                        }
                    },
                    fields: ["name", "value"]
                });
                downloadTypes.load();
                this.downloadTypes = Ext.create('Ext.form.ComboBox', {
                    fieldLabel: 'Allowed Download Types',
                    store: downloadTypes,
                    forceSelection: true,
                    displayField: 'name',
                    valueField: 'value',
                    valueNotFoundText: "Empty",
                    queryMode: 'local',
                    editable: false,
                    autoSelect: true,
                    width: 300,
                    labelWidth: 150,
                    multiSelect: true,
                    disabled: this.isRetailer,
                    hidden: !(this.retailerClassExists),
                    value: this.downloadTypes
                });


                //download type start 
//                var downloadTypes = Ext.create('Ext.data.Store', {
//                    fields: ['name', 'value'],
//                    data: [
//                        {"value": "Csv", "name": "Csv"},
//                        {"value": "Excel", "name": "Excel"},
//                    ]
//                });


                this.ftpFileTypeCombo = Ext.create('Ext.form.ComboBox', {
                    fieldLabel: 'Download Type',
                    store: downloadTypes,
                    queryMode: 'local',
                    displayField: 'name',
                    valueField: 'value',
                    width: 300,
                    multiSelect: true,
                    hidden: true
                });

                //download type start 



                if (this.activeFtpFileType) {
                    this.ftpFileTypeCombo.setValue(this.activeFtpFileType);
                } else {
                    this.ftpFileTypeCombo.setValue("Csv");
                }



                var plugins = ['pimcore.gridfilters'];

                var renderGrid = true;
                if (this.data.orgs) {
//                    this.orgCombo.setValue(this.data.orgs);
                    this.orgObjectId = this.data.orgs;
                    if (this.data.orgs && this.data.orgs != '') {
                        renderGrid = false;

                    }
                }

                this.orgObjectId = null;
                var fromInside = false;

                this.fromClearFilter = false;

                var render = true;
                if (this.data.mapping) {
                    this.mappingComboValue = this.data.mapping;
                    this.renderGrid(this.data.mapping, false);
                    render = false;
                }

                var mappingComboStore = new Ext.data.JsonStore({
                    storeId: 'myStore',
                    proxy: {
                        type: 'ajax',
                        url: '/admin/DistributionHub/channel/get-mapping-combo-store',
                        reader: {
                            type: 'json',
                            rootProperty: 'mappingStore'
                        }
                    },
                    fields: ["id", "name", "classUsed"]

                });

                mappingComboStore.load();

                this.mappingCombo = Ext.create('Ext.form.ComboBox', {
                    fieldLabel: 'Select Mapping',
                    store: mappingComboStore,
                    forceSelection: true,
                    displayField: 'name',
                    valueField: 'id',
                    value: this.mappingComboValue,
                    //hidden: this.isRetailer,
                    disabled: this.isRetailer,
                });

                this.mappingChanged = false;

                this.mappingCombo.on("change", function (scope, newValue, oldValue, eOpts) {
//                    if (render) {
                    this.mappingObjectId = newValue;
                    this.renderGrid(newValue, false);
                    this.mappingChanged = true;
//                    } else {
//                        render = true;
//                    }

                }.bind(this));

                this.languageCombo.on("change", function (scope, newValue, oldValue, eOpts) {
                    mainScope.refreshGrid();
                }.bind(this));


                this.objectTypeCombo.on("change", function (scope, newValue, oldValue, eOpts) {
                    mainScope.refreshGrid();
                }.bind(this));

                this.qualityCheckField.on("change", function (scope, newValue, oldValue, eOpts) {
                    mainScope.refreshGrid();
                }.bind(this));


                if (this.retailerClassExists) {
                    this.retailerCombo.on("change", function (scope, newValue, oldValue, eOpts) {
                        mainScope.refreshGrid();
                    }.bind(this));
                }



                //thumbnailComboStore.load();



                /*thumbnailComboStore.load({
                 params:{'retailerId':this.retailerComboValue},
                 scope: this,
                 callback: function(records, operation, success) {
                 if (success) {
                 this.thumbnailCombo.bindStore(thumbnailComboStore);
                 }
                 }
                 });*/

                var metadataSelectStore = new Ext.data.JsonStore({
                    proxy: {
                        type: 'ajax',
                        url: '/admin/DistributionHub/channel/get-all-predefined-asset-metadata',
                        reader: {
                            type: 'json',
                            rootProperty: 'metadata'
                        }
                    },
                    fields: ["value", "name"]

                });

                metadataSelectStore.load();

                this.metadataSelect = Ext.create('Ext.ux.form.ItemSelector', {
                    name: "metadata",
                    displayField: "name",
                    valueField: "value",
                    fieldLabel: "Select Metadata",
                    store: metadataSelectStore,
                    fromTitle: 'Available',
                    toTitle: 'Selected',
                    width: 700,
                    height: 250,
                    labelWidth: 150,
                    value: this.metadata
                });



                /*
                 this.downloadDataButton =
                 {
                 id: "download_data_" + this.data.id,
                 text: 'Download as CSV',
                 hidden: true,
                 handler: this.download.bind(this, "csv")
                 };
                 
                 this.downloadImageButton =
                 {
                 id: "download_image_" + this.data.id,
                 text: 'Download Images',
                 hidden: true,
                 handler: this.download.bind(this, "image")
                 };
                 
                 this.downloadXmlButton =
                 {
                 id: "download_xml_" + this.data.id,
                 text: 'Download as XML',
                 hidden: true,
                 handler: this.download.bind(this, "xml")
                 };
                 
                 this.downloadJsonButton =
                 {
                 id: "download_json_" + this.data.id,
                 text: 'Download as JSON',
                 hidden: true,
                 handler: this.download.bind(this, "json")
                 };
                 
                 this.pushToFtpButton =
                 {
                 id: "push_to_ftp_" + this.data.id,
                 text: 'Push to FTP',
                 hidden: true,
                 handler: this.pushToFtp.bind(this)
                 };
                 
                 this.saveButton =
                 {
                 text: 'Save',
                 handler: this.saveChannel.bind(this)
                 };
                 */

                this.downloadSplitButton = {
                    xtype: 'splitbutton',
                    hidden: true,
                    id: "download_as_" + this.data.id,
                    text: 'Download',
                    iconCls: 'pimcore_icon_export',
                    menu: [
                        {
                            id: "download_data_" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Data CSV',
                            hidden: true,
                            handler: this.download.bind(this, "csv")
                        },
                        {
                            id: "download_xls_" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Data Excel',
                            hidden: true,
                            handler: this.download.bind(this, "xls")
                        },
                        {
                            id: "download_xml_" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Data XML',
                            hidden: true,
                            handler: this.download.bind(this, "xml")
                        },
                        {
                            id: "download_json_" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Data JSON',
                            hidden: true,
                            handler: this.download.bind(this, "json")
                        },
                        {
                            id: "download_image_" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Images',
                            hidden: true,
                            handler: this.download.bind(this, "image")
                        },
                        {
                            id: "download_assets_" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Assets',
                            hidden: true,
                            handler: this.download.bind(this, "assets")
                        }
                    ]
                };

                this.ftpSplitButton = {
                    xtype: 'splitbutton',
                    id: "push_to_ftp_as_" + this.data.id,
                    text: 'Push To FTP',
                    hidden: true,
                    iconCls: 'pimcore_icon_export',
                    menu: [
                        {
                            id: "push_to_ftp_as_Csv" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Data CSV',
                            hidden: true,
                            handler: this.pushToFtp.bind(this, "Csv")
                        },
                        {
                            id: "push_to_ftp_as_Excel" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Data Excel',
                            hidden: true,
                            handler: this.pushToFtp.bind(this, "Excel")
                        }, {
                            id: "push_to_ftp_as_xml_" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Data  XML',
                            hidden: true,
                            handler: this.pushToFtp.bind(this, "Xml")
                        },
                        {
                            id: "push_to_ftp_as_json_" + this.data.id,
                            iconCls: 'pimcore_icon_export',
                            text: 'Data JSON',
                            hidden: true,
                            handler: this.pushToFtp.bind(this, "Json")
                        },
                    ]
                };
                this.pushToFtpButton = {
                    id: "push_to_ftp_" + this.data.id,
                    text: 'Push to FTP',
                    hidden: true,
                    handler: this.pushToFtp.bind(this)
                };
                this.saveButton = {
                    text: 'Save',
                    iconCls: "pimcore_icon_apply",
                    handler: this.saveChannel.bind(this)
                };

                this.panel = new Ext.form.FormPanel({
                    layout: "fit",
                    region: "center",
                    id: "channeldata_" + id,
                    title: "Data",
                    bodyStyle: "padding: 10px;",
                    labelWidth: 150,
                    name: "channel_entity_panel",
                    tbar: [

                    ],
                    items: [
                    ],
                    dockedItems: [
                        {
                            xtype: 'toolbar',
                            dock: 'top',
                            items: [
                                this.mappingCombo,
                                this.languageCombo,
                                this.objectTypeCombo

                            ]
                        },

                        {
                            xtype: 'toolbar',
                            dock: 'top',
                            items: [
                                this.thresholdValueField,
                                this.qualityCheckField,
                                this.retailerCombo,
                                this.downloadTypes,
                                this.shareCheckBox

                            ]
                        }
                    ],

                    buttons: [
                        this.downloadSplitButton,
                        this.ftpSplitButton,
                        this.pushToFtpButton,
                        this.saveButton
                    ]

                });

                this.assetPanel = new Ext.form.FormPanel({
//                    layout: "fit",
                    region: "center",
                    title: "Asset Configuration",
                    id: "channelassetconf_" + id,
                    bodyStyle: "padding: 10px;",
                    labelWidth: 150,
                    name: "channel_asset_panel",
                    items: [
                        this.thumbnailCombo,
                        this.metadataSelect
                    ],
                    buttons: [
//                        this.downloadSplitButton,
//                        this.pushToFtpButton,
                        this.saveButton
                    ]
                });


                this.tabPanel = new Ext.TabPanel({
                    layout: "fit",
                    region: "center",
                    title: this.data.key,
                    id: "channel_" + id,
                    closable: true,
                    labelWidth: 150,
                    items: [this.panel
                    ]
                });

                var data = [];
                var columns = [];
//                 if(!this.downloadStats){
//                     this.downloadStats = {};
//                 }

//              if (this.downloadStats.isArray() && this.downloadStats.length > 0) {
//                if (this.downloadStats != null && this.downloadStats.size() > 0) {
//                    var columnName = this.downloadStats[0];
//
//                } else {
//                    columnName = [];
//                }
//                var i = 0;
//
//                Ext.Array.each(columnName, function (record) {
//                    columns [i] = {
//                        text: record,
//                        flex: 1,
//                        sortable: false,
//                        hideable: true,
//                        dataIndex: i
//                    };
//                    i++;
//                });



//                if (this.downloadStats && this.downloadStats.length > 0) {
//
////                    this.downloadStats.splice(0, 1);
//
//
//                    var x = 0;
//                    for (var j = this.downloadStats.length - 1; j >= 0; j--) {
//                        var record = this.downloadStats[j];
//                        data [x] = {};
//                        for (var k = 0; k < columns.length; k++) {
//                            data [x][k] = record[k];
//                        }
//                        x++;
//                    }
//                }
//
//                var downloadStore = Ext.create('Ext.data.Store', {
//                    data: data
//                });

                var scope = this;

//                Ext.define('downloadStoreModel', {
//                    extend: 'Ext.data.Model',
//                    fields: [
//                        {name: 'DownloadBy', type: 'string'},
//                        {name: 'DownloadDate', type: 'int', },
//                        {name: 'DownloadType', type: 'string'},
//                    ],
//
//                });

//                var downloadStore = new Ext.data.JsonStore({
//                    storeId: "downloadStore_" + scope.channelId,
//                    proxy: {
//                        type: 'ajax',
//                        url: '/admin/DistributionHub/channel/get-download-stats',
//                        reader: {
//                            type: 'json',
//                            rootProperty: 'data',
//
//                        },
//                        extraParams: {
//                            channelId: scope.channelId
//                        }
//                    },
////                    autoLoad: true,
//                    fields: ["DownloadBy", "DownloadDate", "DownloadType"]
//                });

//for applying filters on the downloadStatsGrid -- start
//                this.userStore = new Ext.data.JsonStore({
//                    autoDestroy: true,
//                    autoLoad: true,
//                    proxy: {
//                        type: 'ajax',
//                        url: '/admin/user/get-users-for-sharing',
//                        reader: {
//                            rootProperty: 'data',
//                            idProperty: 'id'
//                        }
//                    },
//                    fields: ['id', 'label']
//                });

//for applying filters on the downloadStatsGrid -- End

                this.downloadStore = new Ext.data.JsonStore({
                    proxy: {
                        type: 'ajax',
                        url: '/admin/DistributionHub/channel/get-download-stats',
                        reader: {
                            type: 'json',
                            rootProperty: 'data'
                        },
                        extraParams: {
                            channelId: scope.channelId
                        }
                    },
                    fields: ["downloadby", "downloaddate", "downloadtype"],
//                    remoteFilter: true,
                    autoLoad: true,

                });

                this.downloadpagingtoolbar = pimcore.helpers.grid.buildDefaultPagingToolbar(this.downloadStore, {pageSize: 25});

                this.downloadStatsGrid = Ext.create('Ext.grid.Panel', {
                    frame: false,
//                    layout: "fit",
                    title: "Download Statistics",
                    store: scope.downloadStore,
                    columns: [{
                            text: "Download By",
                            flex: 1,
                            sortable: false,
                            hideable: true,
                            dataIndex: "downloadby",
//                            filter: {
//                                type: 'list',
//                                store:  this.userStore,
//                                idField: 'label',
//                                labelField: 'label'
//                            }
                        },
                        {
                            text: "Download Date",
                            flex: 1,
                            sortable: false,
                            hideable: true,
                            dataIndex: "downloaddate",
//                            filter: {
//                                type: 'date',
//
//                                // optional picker config
//                                pickerDefaults: {
//                                    // any DatePicker configs
//                                }
//                            }
                        }, {
                            text: "Download Type",
                            flex: 1,
                            sortable: false,
                            hideable: true,
                            dataIndex: "downloadtype",
//                            filter: {
//                                type: 'list',
//                                store: downloadTypes,
//                                idField: 'value',
//                                labelField: 'name'
//                            }
                        }],
                    columnLines: true,
                    autoScroll: true,
                    scrollable: true,
                    stripeRows: true,
                    flex: 1,
                    bodyCls: "pimcore_editable_grid",
                    border: true,
                    trackMouseOver: true,
                    loadMask: true,
                    plugins: 'gridfilters',
                    viewConfig: {
                        forceFit: false,
                        xtype: 'patchedgridview'
                    },
                    bbar: this.downloadpagingtoolbar,
                    cls: 'pimcore_object_grid_panel',
                    header: {
                        titlePosition: 0,
                        items: [{
                                xtype: 'button',
                                iconCls: "pimcore_icon_reload",
                                text: 'Refresh',
                                handler: function () {
                                    scope.downloadStore.load();
                                    
                                }
                            }]
                    },
                });



//                        downloadStore.load();

//                this.channelDataPanel.add(new Ext.Panel({
//                    layout: "fit",
//                    region: "center",
//                    title: "Download Statistics",
//                    items: [this.downloadStatsGrid],
////                    bbar: this.downloadpagingtoolbar
//                }));
//
//                this.channelDataPanel.updateLayout();
//                this.tabPanel.updateLayout();



                this.channelDataPanel = new Ext.form.FormPanel({
                    layout:
                            {
                                type: "vbox",
                                align: "stretch"
                            },
                    height: "100%",
                    title: "Channel Details",
                    id: "channelbasicdata_" + id,
                    bodyStyle: "padding: 10px;",
                    labelWidth: 200,
                    name: "channel_data_panel",
                    items: [
                        {
                            xtype: 'textfield',
                            name: 'name',
                            fieldLabel: 'Name',
                            labelWidth: 150,
                            height: 35,
                            editable: false, // requires a non-empty value
                            value: this.data.name
                        }, {
                            xtype: 'textfield',
                            name: 'creationDate',
                            height: 35,

                            labelWidth: 150,
                            fieldLabel: 'Creation Date',
                            editable: false,
                            value: this.data.creationDate
                        }, {
                            xtype: 'textfield',
                            name: 'CreatedBy',
                            height: 35,

                            labelWidth: 150,
                            fieldLabel: 'Created By',
                            editable: false,
                            value: this.data.createdBy
                        }, {
                            xtype: 'textfield',
                            name: 'ModificationDate',
                            height: 35,

                            labelWidth: 150,
                            fieldLabel: 'Modification Date',
                            editable: false,
                            value: this.data.modificationDate
                        }, {
                            xtype: 'textfield',
                            name: 'ModifiedBy',
                            height: 35,

                            labelWidth: 150,
                            fieldLabel: 'Modified By',
                            editable: false,
                            value: this.data.modifiedBy
                        },
                        this.downloadStatsGrid


                    ],
                    buttons: [
                    ]
                });


                var date = {
                    width: 130,
                    format: 'd/m/Y',
                    value: '02/03/2018'
                };

                var time = {
                    format: "H:i",
                    emptyText: "",
                    width: 90,
                    value: '09:00',
                };

//                if (this.data) {
//                    var tmpDate = new Date(intval(this.data) * 1000);
//                    date.value = tmpDate;
//                    time.value = tmpDate;
//                }

                this.datefield = Ext.create('Ext.form.field.Date', date);
                this.timefield = Ext.create('Ext.form.field.Time', time);

                this.dateTimeField = Ext.create('Ext.form.FieldContainer', {
                    layout: 'hbox',
                    fieldLabel: "Date & Time",
                    combineErrors: false,
                    labelWidth: 150,
                    width: 100,
                    items: [this.datefield, this.timefield],
                    componentCls: "object_field",
                });

                this.scheduledownloadTypes = Ext.create('Ext.form.ComboBox', {
                    fieldLabel: 'Download Types',
                    store: downloadTypes,
                    forceSelection: true,
                    displayField: 'name',
                    valueField: 'value',
                    valueNotFoundText: "Empty",
                    queryMode: 'local',
                    editable: false,
                    autoSelect: true,
                    width: 100,
                    columnWidth: 100,
                    labelWidth: 150,
                    multiSelect: false,
                    value: "Csv"
                });

                var scheduleDownloadOptionsStore = Ext.create('Ext.data.Store', {
                    fields: ['abbr', 'name'],
                    data: [
                        {"id": "server", "name": "Download on Server"},
                        {"id": "ftp", "name": "FTP"},
                        {"id": "email", "name": "Email"}
                    ]
                });

                this.scheduleDownloadOptions = Ext.create('Ext.form.ComboBox', {
                    fieldLabel: 'Download Option',
                    store: scheduleDownloadOptionsStore,
                    queryMode: 'local',
                    valueField: 'id',
                    forceSelection: true,
                    displayField: 'name',
                    valueNotFoundText: "Empty",
                    queryMode: 'local',
                    editable: false,
                    autoSelect: true,
                    width: "50%",
                    labelWidth: 150,
                    value: "server"
                });

                if (!Ext.ClassManager.isCreated('Schedule_' + id)) {
                    Ext.define('Schedule_' + id, {
                        extend: 'Ext.data.Model',
                        autoDestroy: true,
                        fields: ['date', 'downloadType', 'downloadOption', 'status']
                    });
                }


                var scheduleStatsStore = Ext.create('Ext.data.Store', {
                    model: 'Schedule_' + id,
                    autoDestroy: true,
                    data: [
                        {date: '02/03/2018 09:00', downloadType: 'Data CSV', downloadOption: 'Email', status: 'Pending'},
                        {date: '01/03/2018 19:43', downloadType: 'Data Excel', downloadOption: 'FTP', status: 'Pending'},
                        {date: '19/02/2018 03:40', downloadType: 'Data CSV', downloadOption: 'Download on Server', status: 'Pending'},
                        {date: '05/02/2018 02:15', downloadType: 'Assets', downloadOption: 'Email', status: 'Success'},
                        {date: '08/02/2018 16:27', downloadType: 'Assets', downloadOption: 'Email', status: 'Success'},
                        {date: '05/02/2018 18:36', downloadType: 'Data Excel', downloadOption: 'FTP', status: 'Failed'},
                        {date: '29/01/2018 12:48', downloadType: 'Assets', downloadOption: 'Download on Server', status: 'Success'}
                    ]
                });

                var scheduleStatscolumns = [];
                scheduleStatscolumns [0] = {
                    text: "Date & Time",
                    flex: 1,
                    sortable: false,
                    hideable: true,
                    dataIndex: "date"
                };
                scheduleStatscolumns [1] = {
                    text: "Download Type",
                    flex: 1,
                    sortable: false,
                    hideable: true,
                    dataIndex: "downloadType"
                };
                scheduleStatscolumns [2] = {
                    text: "Download Option",
                    flex: 1,
                    sortable: false,
                    hideable: true,
                    dataIndex: "downloadOption"
                };
                scheduleStatscolumns [3] = {
                    text: "Status",
                    flex: 1,
                    sortable: false,
                    hideable: true,
                    dataIndex: "status"
                };

                this.scheduleStatsGrid = Ext.create('Ext.grid.Panel', {
                    frame: false,
//                    layout: "fit",
                    title: "Schedule Statistics",
                    store: scheduleStatsStore,
                    columns: scheduleStatscolumns,
                    columnLines: true,
                    autoScroll: true,
                    scrollable: true,
                    stripeRows: true,
                    flex: 1,
                    bodyCls: "pimcore_editable_grid",
                    border: true,
                    trackMouseOver: true,
                    loadMask: true,
//                    plugins: plugins,
                    viewConfig: {
                        forceFit: false,
                        xtype: 'patchedgridview'
                    },
                    cls: 'pimcore_object_grid_panel'
                });

                this.schedulePanel = new Ext.form.FormPanel({
                    layout:
                            {
                                type: "vbox",
                                align: "stretch"
                            },
                    height: "100%",
                    title: "Schedule",
                    id: "channelschedule_" + id,
                    bodyStyle: "padding: 10px;",
                    labelWidth: 200,
                    name: "channel_schedule_panel",
                    items: [
                        this.dateTimeField,
                        this.scheduledownloadTypes,
                        this.scheduleDownloadOptions,
                        this.scheduleStatsGrid


                    ],
                    tbar: {
                        items: [
                            {
                                text: 'Add Schedule',
                                iconCls: "emailcustomization_icon_compose",
                            },
                        ]

                    },
                    buttons: [
                    ]
                });

//                this.createDownloadStatsGrid();

                if (!this.isRetailer) {
                    this.tabPanel.add(this.assetPanel);
                    this.tabPanel.add(this.channelDataPanel);
                    this.tabPanel.add(this.schedulePanel);
                }

                this.parentPanel.getEditPanel().add(this.tabPanel);
                this.parentPanel.getEditPanel().setActiveTab(this.tabPanel);

                pimcore.layout.refresh();
            },
            renderGrid: function (newValue, grid) {
                var mappingData;
                Ext.Ajax.request({
                    url: '/admin/DistributionHub/channel/get-channel-grid-column-data',
                    method: "POST",
                    params: {
                        id: newValue
                    },
                    success: this.createGrid.bind(this, false),
                    failure: function (failResponse) {
                        Ext.Msg.alert(failResponse.responseText);
                    }
                });
            },

            refreshGrid: function () {
                this.createGrid(this.config, this.response);
            },
            // create grid
            createGrid: function (fromConfig, response) {

                if (fromConfig) {
                    this.config = fromConfig;
                }
                var itemsPerPage = pimcore.helpers.grid.getDefaultPageSize(-1);

                var fields = [];
                if (response.responseText) {
                    this.response = response;
                    response = Ext.decode(response.responseText);

                    if (response.pageSize) {
                        itemsPerPage = response.pageSize;
                    }

                    if (!response.thresholdNeeded) {
                        this.thresholdValueField.setHidden(true);
                    } else {
                        this.thresholdValueField.setHidden(false);
                    }

                    if (!response.qualityCheckNeeded) {
                        this.qualityCheckField.setHidden(true);
                    } else {
                        this.qualityCheckField.setHidden(false);
                    }

                    fields = response.availableFields;
                    this.gridLanguage = this.languageCombo.getValue();

                    this.sortinfo = response.sortinfo;
                    if (response.onlyDirectChildren) {
                        this.onlyDirectChildren = response.onlyDirectChildren;
                    }
                } else {
                    fields = response;
                }

                this.fieldData = fields;

                this.fieldObject = {};
                for (var i = 0; i < fields.length; i++) {
                    this.fieldObject[fields[i].key] = fields[i];
                }

                this.classnameUsed = response.classUsed;

                if (this.retailerClassExists) {
                    var allparams = {
                        language: this.gridLanguage,
                        retailer: this.retailerCombo.getValue(),
                        downloadObjectType: this.objectTypeCombo.getValue(),
                        threshold: this.thresholdValueField.getValue(),
                        qualityCheck: this.qualityCheckField.getValue()
                    };
                } else {
                    var allparams = {
                        language: this.gridLanguage,
                        downloadObjectType: this.objectTypeCombo.getValue(),
                        threshold: this.thresholdValueField.getValue(),
                        qualityCheck: this.qualityCheckField.getValue()
                    };
                }

                var plugins = ['pimcore.gridfilters'];
                var gridHelper = new pimcore.plugin.channels.helpers.grid(
                        response.mappingId,
                        fields,
                        '/admin/DistributionHub/channel/get-channel-grid-proxy-data/' + response.classUsed,
                        allparams,
                        false
                        );

                gridHelper.showSubtype = false;
                gridHelper.enableEditor = true;
                gridHelper.limit = 200;

                this.store = gridHelper.getStore();
                if (this.sortinfo) {
                    this.store.sort(this.sortinfo.field, this.sortinfo.direction);
                }
                this.store.setPageSize(itemsPerPage);
                this.filtersAlreadyApplied = false;
                if (this.filters) {
                    var store = this.store;
                    store.filters = this.filters;
                    this.filtersAlreadyApplied = true;
                }

                this.store.load();

                var gridColumns = gridHelper.getGridColumns();
                this.gridcolumndata = gridColumns;
                this.noOfItems = gridHelper.limit;


                var mainScope = this;
                if (this.gridcolumndata !== null) {
                    Ext.getCmp('download_as_' + mainScope.data.id).setVisible(true);
                    Ext.getCmp('push_to_ftp_as_' + mainScope.data.id).setVisible(true);

                    if (mainScope.isRetailer) {


                        Ext.Ajax.request({
                            url: '/admin/DistributionHub/channel/get-allowed-download-types',
                            method: "POST",
                            params: {
                                channelId: this.channelId
                            },
                            success: function (successResponse) {
                                var response = Ext.decode(successResponse.responseText);
                                if (response.success) {
                                    var options = response.options;
                                    console.log("options");
                                    console.log(options);
                                    if (options.indexOf('Csv') >= 0) {
                                        Ext.getCmp('download_data_' + mainScope.data.id).setVisible(true);
                                        Ext.getCmp('push_to_ftp_as_Csv' + mainScope.data.id).setVisible(true);

                                    }
                                    if (options.indexOf('Excel') >= 0) {
                                        Ext.getCmp('download_xls_' + mainScope.data.id).setVisible(true);
                                        Ext.getCmp('push_to_ftp_as_Excel' + mainScope.data.id).setVisible(true);

                                    }
                                    if (options.indexOf('Assets') >= 0) {
                                        Ext.getCmp('download_assets_' + mainScope.data.id).setVisible(true);
                                    }
                                    if (options.indexOf('Xml') >= 0) {
                                        Ext.getCmp('download_xml_' + mainScope.data.id).setVisible(true);
                                        Ext.getCmp('push_to_ftp_as_xml_' + mainScope.data.id).setVisible(true);

                                    }
                                    if (options.indexOf('Json') >= 0) {
                                        Ext.getCmp('download_json_' + mainScope.data.id).setVisible(true);
                                        Ext.getCmp('push_to_ftp_as_json_' + mainScope.data.id).setVisible(true);

                                    }
                                } else {

                                }


                            },
                            failure: function (failResponse) {
                                Ext.Msg.alert(failResponse.responseText);
                            }
                        });
                    } else {
                        Ext.getCmp('download_data_' + this.data.id).setVisible(true);
                        Ext.getCmp('download_xls_' + this.data.id).setVisible(true);
                        Ext.getCmp('download_assets_' + this.data.id).setVisible(true);
                        Ext.getCmp('push_to_ftp_as_Csv' + mainScope.data.id).setVisible(true);
                        Ext.getCmp('push_to_ftp_as_Excel' + mainScope.data.id).setVisible(true);
                        Ext.getCmp('download_xml_' + this.data.id).setVisible(true);
//                      Ext.getCmp('push_to_ftp_' + this.data.id).setVisible(true);
                        Ext.getCmp('download_json_' + this.data.id).setVisible(true);
                        Ext.getCmp('push_to_ftp_as_xml_' + mainScope.data.id).setVisible(true);
                        Ext.getCmp('push_to_ftp_as_json_' + mainScope.data.id).setVisible(true);

                    }
                }

                // add filters
                this.gridfilters = gridHelper.getGridFilters();


                this.toolbarFilterInfo = new Ext.Button({
                    iconCls: "pimcore_icon_filter_condition",
                    hidden: true,
                    text: '<b>' + t("filter_active") + '</b>',
                    tooltip: t("filter_condition"),
                    handler: function (button) {
                        Ext.MessageBox.alert(t("filter_condition"), button.pimcore_filter_condition);
                    }.bind(this)
                });

                this.clearFilterButton = new Ext.Button({
                    iconCls: "pimcore_icon_clear_filters",
                    hidden: true,
                    text: t("clear_filters"),
                    tooltip: t("clear_filters"),
                    handler: function (button) {

                        this.grid.filters.clearFilters();
                        this.toolbarFilterInfo.hide();
                        this.clearFilterButton.hide();

                        this.fromClearFilter = true;
                        this.clearFilterButton.setHidden(true);
                    }.bind(this)
                });

                var hideSaveColumnConfig = !fromConfig;
                // grid
                var outerScope = this;
                this.grid = Ext.create('Ext.grid.Panel', {
                    frame: false,
                    store: this.store,
                    columns: gridColumns,
//                    maxHeight: 600,
                    columnLines: true,
                    autoScroll: true,
                    scrollable: true,
                    stripeRows: true,
                    bodyCls: "pimcore_editable_grid",
                    border: true,
                    trackMouseOver: true,
                    loadMask: true,
                    plugins: plugins,
                    viewConfig: {
                        forceFit: false,
                        xtype: 'patchedgridview',
                        getRowClass: function (record) {
                            var fieldName = outerScope.qualityFieldName;
                            var data = record.data;
                            if (!(data[fieldName] == "" || data[fieldName] == null)) {
                                return "red-row";
                            } else {
                                return "";
                            }
                        }
                    },
                    cls: 'pimcore_object_grid_panel'
                });
                this.grid.on("rowcontextmenu", this.onRowContextmenu);

                this.grid.on("afterrender", function (grid) {
                    var obj = new pimcore.object.helpers.gridTabAbstract();
//                    if (this.grid.getHeight() > this.grid.maxHeight) {
//                        this.grid.setHeight(this.maxHeight);
//                    }
//                    this.grid.center();
                }.bind(this));

                this.grid.on("sortchange", function (ct, column, direction, eOpts) {
                    this.sortinfo = {
                        field: column.dataIndex,
                        direction: direction
                    };
                }.bind(this));

//                 check for filter updates
                this.grid.on("filterchange", function () {
                    var obj = new pimcore.object.helpers.gridTabAbstract();
                    obj.filterUpdateFunction(this.grid, this.toolbarFilterInfo, this.clearFilterButton);
                    this.toolbarFilterInfo.setHidden(true);
                }.bind(this));

                if (this.data.orgs && this.data.orgs != '') {
                    this.clearFilterButton.setHidden(false);
                }

                gridHelper.applyGridEvents(this.grid);

                this.pagingtoolbar = pimcore.helpers.grid.buildDefaultPagingToolbar(this.store, {pageSize: itemsPerPage});

                this.panel.removeAll();
                this.panel.add(new Ext.Panel({
                    layout: "fit",
                    region: "center",
                    tbar: [
                        this.clearFilterButton,
                        this.toolbarFilterInfo,
                    ],
                    items: [this.grid],
                    bbar: this.pagingtoolbar
                }));


                // applying filters on grid -- open

                if (!this.fromClearFilter && !this.filtersAlreadyApplied && !this.mappingChanged) {
                    var appliedFilters = this.data.filter;
                    var columnManager = this.grid.columnManager;
                    if (appliedFilters) {
                        appliedFilters.forEach(function (appliedFilter) {
//                            console.log(appliedFilter.property);
//                            console.log(appliedFilter.property);
                            var column = columnManager.getHeaderByDataIndex(appliedFilter.property);
                            if (column && column.filter) {


                                if (column.filter.type == 'numeric') {
                                    if (appliedFilter.operator == "lt") {
                                        column.filter.setValue({"lt": appliedFilter.value});
                                    }
                                    if (appliedFilter.operator == "gt") {
                                        column.filter.setValue({"gt": appliedFilter.value});
                                    }
                                    if (appliedFilter.operator == "eq") {
                                        column.filter.setValue({"eq": appliedFilter.value});
                                    }
                                } else if (column.filter.type == 'boolean') {
                                    column.filter.setValue(appliedFilter.value);
                                    column.filter.defaultValue = appliedFilter.value;

                                } else if (column.filter.type == 'list') {
                                    var valueArr = appliedFilter.value.split('|');
                                    column.filter.filter.setValue(valueArr);
                                    column.filter.setActive(true);

                                } else if (column.filter.type == 'date') {
                                    var date = new Date(appliedFilter.value);
                                    if (appliedFilter.operator == "eq") {
                                        column.filter.setValue({"eq": date});
                                    }
                                    if (appliedFilter.operator == "lt") {
                                        column.filter.setValue({"lt": date});
                                    }
                                    if (appliedFilter.operator == "gt") {
                                        column.filter.setValue({"gt": date});
                                    }
                                } else {
                                    column.filter.setValue(appliedFilter.value);
                                }
                            }
                        });
                        this.panel.updateLayout();
                        this.tabPanel.updateLayout();
                    }
                } else {
                    this.fromClearFilter = false;
                    if (this.mappingChanged) {
                        this.mappingChanged = false;
                    }
                }

                var gridStore = this.grid.getStore();
                var currentfilters = gridStore.getFilters();
                if (currentfilters.length > 0) {
                    this.clearFilterButton.setHidden(false);
                }
            },
            saveChannel: function () {
                var mappingObjectId = this.mappingCombo.getValue();
                var thumbnail = this.thumbnailCombo.getValue();
                var retailer;
                if (this.retailerClassExists) {
                    retailer = this.retailerCombo.getValue();
                }
                var errorFlag = false;
                var error = '';

                if (mappingObjectId == "" || mappingObjectId == null) {
                    error += 'Please select Mapping<br />';
                    errorFlag = true;
                }

                // if (thumbnail.length == 0) {
                //     error += 'Please select atleast 1 Transformation for images<br />';
                //     errorFlag = true;
                // }

                if (errorFlag) {
                    Ext.Msg.alert('Error: Channel can not be saved.', error);
                    return false;
                }

                if (mappingObjectId && mappingObjectId != '') {
                    var appliedFilters = this.getAppliedFilters(this.grid);

                    var retailerValue;
                    if (this.retailerClassExists) {
                        retailerValue = this.retailerCombo.getValue();
                    }

                    Ext.Ajax.request({
                        url: '/admin/DistributionHub/channel/save-channel',
                        method: 'POST',
                        params: {
                            filters: Ext.encode(appliedFilters),
                            mappingObjectId: mappingObjectId,
                            channelObjectId: this.data.id,
                            // ftpFileType: this.ftpFileTypeCombo.getValue(),
                            thresholdValue: this.thresholdValueField.getValue(),
                            qualityCheck: this.qualityCheckField.getValue(),
                            retailer: retailerValue,
                            language: this.languageCombo.getValue(),
                            downloadObjectType: this.objectTypeCombo.getValue(),
                            share: this.shareCheckBox.getValue(),
                            downloadTypes: JSON.stringify(this.downloadTypes.getValue()),
                            thumbnail: JSON.stringify(this.thumbnailCombo.getValue()),
                            metadata: JSON.stringify(this.metadataSelect.getValue())
                        },
                        success: function (response) {
                            var successFlag = Ext.decode(response.responseText);

                            if (successFlag.success) {
                                pimcore.helpers.showNotification(t("success"), "Channel saved successfully",
                                        "success");
                            } else {
                                pimcore.helpers.showNotification(t('error'), successFlag.msg, 'error');
                            }
                        }.bind(this),
                        failure: function (response) {
                        },
                        callback: function (options, success, response) {
                        }
                    });
                } else {
                    Ext.Msg.alert('Channel can not be saved.', 'Please select a mapping.');
                }
            },
            download: function (type) {
                console.log(type);
                var headerData = this.gridcolumndata;
                var rowData = [];
                var filterData, filters = null;
                var gridPanel = this.panel.items.items[0].items.items[0];
                var gridStore = gridPanel.getStore();
                var gridPanelData = gridStore.data;

                var filterData = gridPanel.getStore().getFilters().items;
                if (filterData.length > 0) {
                    filters = gridPanel.getStore().getProxy().encodeFilters(filterData);
                }

                var numberOfRows = gridPanelData.length;
                var storeRecords = gridStore.totalCount;

                var dataIndexArr = [];
                var dataDataValues = [];
                var headerMeta = [];
                console.log(headerData);
                headerData.forEach(function (key, value) {
                    dataIndexArr.push(key.dataIndex);
                    dataDataValues.push(key.header);
                    var tempArray = [];
                    tempArray.push(key.dataIndex);
                    var type = '';
                    console.log(key);
                    if (key.layout && key.layout.type) {
                        type = key.layout.type;
                    }
                    tempArray.push(type);
                    headerMeta.push(tempArray);

                });
                var dataArray = [];


                for (var i = 0; i < numberOfRows; i++) {
                    gridPanelData.items[i].data["inheritedFields"] = null;

                    var dataItem = gridPanelData.items[i].data;
                    var tempArray = [];
                    var count = 0;
                    for (var key in dataItem) {
                        if (dataItem.hasOwnProperty(key)) {
                            if (dataIndexArr.indexOf(key) === -1) {

                                dataItem[key] = null;
                            } else {
                                tempArray[count] = dataItem[key];
                                count++;
                            }
                        }
                    }

                    dataArray[i] = tempArray;
                    gridPanelData.items[i].data = dataItem;
                    rowData[i] = gridPanelData.items[i].data;
                }

                var header = JSON.stringify(dataDataValues);
                var row = JSON.stringify(dataArray);
                var headerMeta = JSON.stringify(headerMeta);

                var url = '/admin/DistributionHub/channel/download-' + type;

                var retailerValue;
                if (this.retailerClassExists) {
                    retailerValue = this.retailerCombo.getValue();
                }

                Ext.Ajax.request({
                    url: url,
                    method: "POST",
                    params: {
                        channelObjectId: this.data.id,
                        mappingObjectId: this.mappingCombo.getValue(),
                        headerData: header,
                        rowData: row,
                        headerMeta: headerMeta,
                        filterData: filters,
                        recordCount: storeRecords,
                        classnameUsed: this.classnameUsed,
                        retailer: retailerValue,
                        language: this.languageCombo.getValue(),
                        downloadObjectType: this.objectTypeCombo.getValue(),
                        threshold: this.thresholdValueField.getValue(),
                        qualityCheck: this.qualityCheckField.getValue(),

                    },
                    success: function (response, opts) {
                        var successFlag = Ext.decode(response.responseText);

                        if (type === "image") {
                            if (successFlag.success == true) {
                                pimcore.settings.showCloseConfirmation = false;
                                window.setTimeout(function () {
                                    pimcore.settings.showCloseConfirmation = true;
                                }, 3000);
                                location.href = JSON.parse(response.responseText).zip;
                            } else {
                                Ext.MessageBox.show({
                                    title: "No Images",
                                    message: "No Images to download",
                                    buttons: Ext.MessageBox.OK,
                                });
                            }
                        } else if (type === "assets") {
                            if (successFlag.success == true) {
                                pimcore.settings.showCloseConfirmation = false;
                                window.setTimeout(function () {
                                    pimcore.settings.showCloseConfirmation = true;
                                }, 3000);
                                location.href = JSON.parse(response.responseText).zip;
                            } else if (successFlag.success == false && successFlag.noTransformation == true) {
                                pimcore.helpers.showNotification(t('error'), successFlag.msg, 'error');

                            } else {
                                Ext.MessageBox.show({
                                    title: "No Assets",
                                    message: "No Assets to download",
                                    buttons: Ext.MessageBox.OK,
                                });
                            }
                        } else {
                            if (successFlag.success) {
                                pimcore.helpers.download("/admin/asset/download?id=" + successFlag.id);

                                window.setTimeout(function () {
                                    Ext.Ajax.request({
                                        url: '/admin/DistributionHub/channel/delete-file',
                                        params: {
                                            assetId: successFlag.id
                                        },
                                        success: function (response, opts) {
                                        },
                                        failure: function (response, opts) {
                                            console.log('server-side failure with status code ' + response.status);
                                        }
                                    });
                                }, 3000);
                            } else {
                                pimcore.helpers.showNotification(t('error'), successFlag.msg, 'error');
                            }
                        }
                    },
                    failure: function (response, opts) {
                        console.log('server-side failure with status code ' + response.status);
                    }
                });
            },
            pushToFtp: function (type) {
                if (type == "" || type == null) {
                    type = this.ftpFileTypeCombo.getValue();
                }
                var headerData = this.gridcolumndata;
                var rowData = [];
                var filterData, filters = null;
                var gridPanel = this.panel.items.items[0].items.items[0];
                var gridStore = gridPanel.getStore();
                var gridPanelData = gridStore.data;

                var filterData = gridPanel.getStore().getFilters().items;
                if (filterData.length > 0) {
                    filters = gridPanel.getStore().getProxy().encodeFilters(filterData);
                }

                var numberOfRows = gridPanelData.length;
                var storeRecords = gridStore.totalCount;

                var dataIndexArr = [];
                var dataDataValues = [];
                var headerMeta = [];
                headerData.forEach(function (key, value) {
                    dataIndexArr.push(key.dataIndex);
                    dataDataValues.push(key.header);
                    var tempArray = [];
                    tempArray.push(key.dataIndex);
                    var type = '';
                    if (key.layout && key.layout.type) {
                        type = key.layout.type;
                    }
                    tempArray.push(type);
                    headerMeta.push(tempArray);

                });
                var dataArray = [];


                for (var i = 0; i < numberOfRows; i++) {
                    gridPanelData.items[i].data["inheritedFields"] = null;

                    var dataItem = gridPanelData.items[i].data;
                    var tempArray = [];
                    var count = 0;
                    for (var key in dataItem) {
                        if (dataItem.hasOwnProperty(key)) {
                            if (dataIndexArr.indexOf(key) === -1) {

                                dataItem[key] = null;
                            } else {
                                tempArray[count] = dataItem[key];
                                count++;
                            }
                        }
                    }

                    dataArray[i] = tempArray;
                    gridPanelData.items[i].data = dataItem;
                    rowData[i] = gridPanelData.items[i].data;
                }

                var header = JSON.stringify(dataDataValues);
                var row = JSON.stringify(dataArray);
                var headerMeta = JSON.stringify(headerMeta);

                Ext.Ajax.request({
                    url: '/admin/DistributionHub/channel/push-to-ftp',
                    method: "POST",
                    params: {
                        channelObjectId: this.data.id,
                        mappingObjectId: this.mappingCombo.getValue(),
                        headerData: header,
                        rowData: row,
                        headerMeta: headerMeta,
                        filterData: filters,
                        recordCount: storeRecords,
                        classnameUsed: this.classnameUsed,
                        ftpFileType: type,
                        language: this.languageCombo.getValue(),
                        downloadObjectType: this.objectTypeCombo.getValue()

                    },
                    success: function (response, opts) {
                        var successFlag = Ext.decode(response.responseText);
                        if (successFlag.success === true) {
                            pimcore.helpers.showNotification(t("success"), "File uploded successfully",
                                    "success");
                        } else if (successFlag.success == false && successFlag.nodetails == true) {
                            pimcore.helpers.showNotification(t('error'), successFlag.message, 'error');

                        } else {
                            pimcore.helpers.showNotification(t('error'), 'Error uploading file', 'error');
                        }
                    },
                    failure: function (response, opts) {
                        console.log('server-side failure with status code ' + response.status);
                    }
                });
            },
            getAppliedFilters: function (grid) {
                var filterStringConfig = [];
                var filterData = grid.getStore().getFilters().items;

                if (filterData.length > 0) {

                    for (var i = 0; i < filterData.length; i++) {

                        var operator = filterData[i].getOperator();
                        var value = filterData[i].getValue();

                        if (value instanceof Date) {
                            value = Ext.Date.format(value, "Y-m-d");
                        }
                        var arr = {};
                        arr.property = filterData[i].getProperty();
                        arr.operator = operator;
                        if (value && typeof value == "object") {
                            arr.value = value.join("|");
                            //filterStringConfig.push(filterData[i].getProperty() + " " + operator + );
                        } else {
                            arr.value = value;
                            //filterStringConfig.push(filterData[i].getProperty() + " " + operator + " " + value);
                        }
                        filterStringConfig.push(arr);
                    }

                }

                return filterStringConfig;
            },
            onRowContextmenu: function (grid, record, tr, rowIndex, e, eOpts) {

                var menu = new Ext.menu.Menu();
                var data = grid.getStore().getAt(rowIndex);

                console.log(data);

                var selectedRows = grid.getSelectionModel().getSelection();

                if (selectedRows.length <= 1) {

                    menu.add(new Ext.menu.Item({
                        text: t('open'),
                        iconCls: "pimcore_icon_open",
                        handler: function (data) {
                            pimcore.helpers.openObject(data.data.id, "object");
                        }.bind(this, data)
                    }));

                    if (pimcore.elementservice.showLocateInTreeButton("object")) {
                        menu.add(new Ext.menu.Item({
                            text: t('show_in_tree'),
                            iconCls: "pimcore_icon_show_in_tree",
                            handler: function () {
                                try {
                                    try {
                                        pimcore.treenodelocator.showInTree(record.id, "object", this);
                                    } catch (e) {
                                        console.log(e);
                                    }

                                } catch (e2) {
                                    console.log(e2);
                                }
                            }
                        }));
                    }

                    menu.add(new Ext.menu.Item({
                        text: t('delete'),
                        iconCls: "pimcore_icon_delete",
                        handler: function (data) {
                            var store = this.getStore();
                            var options = {
                                "elementType": "object",
                                "id": data.data.id,
                                "success": store.reload.bind(this.getStore())
                            };
                            pimcore.elementservice.deleteElement(options);
                        }.bind(grid, data)
                    }));
                } else {
                    menu.add(new Ext.menu.Item({
                        text: t('open_selected'),
                        iconCls: "pimcore_icon_open",
                        handler: function (data) {
                            var selectedRows = grid.getSelectionModel().getSelection();
                            for (var i = 0; i < selectedRows.length; i++) {
                                pimcore.helpers.openObject(selectedRows[i].data.id, "object");
                            }
                        }.bind(this, data)
                    }));

                    menu.add(new Ext.menu.Item({
                        text: t('delete_selected'),
                        iconCls: "pimcore_icon_delete",
                        handler: function (data) {
                            var ids = [];
                            var selectedRows = grid.getSelectionModel().getSelection();
                            for (var i = 0; i < selectedRows.length; i++) {
                                ids.push(selectedRows[i].data.id);
                            }
                            ids = ids.join(',');

                            var options = {
                                "elementType": "object",
                                "id": ids,
                                "success": function () {
                                    this.getStore().reload();
                                    var tree = pimcore.globalmanager.get("layout_object_tree");
                                    var treePanel = tree.tree;
                                    tree.refresh(treePanel.getRootNode());
                                }.bind(this)
                            };
                            pimcore.elementservice.deleteElement(options);
                        }.bind(grid, data)
                    }));
                }

                pimcore.plugin.broker.fireEvent("prepareOnRowContextmenu", menu, this, selectedRows);

                e.stopEvent();
                menu.showAt(e.pageX, e.pageY);
            },
            createDownloadStatsGrid: function () {

//                var columnName = this.downloadStats[0];
//                var i = 0;
//                var columns = [];
//                Ext.Array.each(columnName, function (record) {
//                    columns [i] = {
//                        text: record,
//                        flex: 1,
//                        sortable: false,
//                        hideable: true,
//                        dataIndex: i
//                    };
//                    i++;
//                });
//
//                this.downloadStats.splice(0, 1);
//                var data = [];
//                var x = 0;
//                for (var j = this.downloadStats.length - 1; j >= 0; j--) {
//                    var record = this.downloadStats[j];
//                    data [x] = {};
//                    for (var k = 0; k < columns.length; k++) {
//                        data [x][k] = record[k];
//                    }
//                    x++;
//                }
//
//                var downloadStore = Ext.create('Ext.data.Store', {
//                    data: data
//                });
//
//
//                // grid
//                downloadStore.setPageSize(2);
//                this.downloadStatsGrid = Ext.create('Ext.grid.Panel', {
//                    frame: false,
//                    layout: "fit",
//                    store: downloadStore,
//                    columns: columns,
//                    columnLines: true,
//                    autoScroll: true,
//                    scrollable: true,
//                    stripeRows: true,
//                    bodyCls: "pimcore_editable_grid",
//                    border: true,
//                    trackMouseOver: true,
//                    loadMask: true,
////                    plugins: plugins,
//                    viewConfig: {
//                        forceFit: false,
//                        xtype: 'patchedgridview'
//                    },
//                    cls: 'pimcore_object_grid_panel'
//                });
//
////                this.downloadpagingtoolbar = pimcore.helpers.grid.buildDefaultPagingToolbar(downloadStore, {pageSize: 2});
//
//                this.channelDataPanel.add(new Ext.Panel({
//                    layout: "fit",
//                    region: "center",
//                    title: "Download Statistics",
//                    items: [this.downloadStatsGrid],
////                    bbar: this.downloadpagingtoolbar
//                }));
//
//                this.channelDataPanel.updateLayout();
//                this.tabPanel.updateLayout();

//
//
//
//
//
//                var gridColumns = [
//                    {
//                        text: 'Name',
//                        width: 100,
//                        sortable: false,
//                    },
//                    {
//                        text: 'Email Address',
//                        width: 150,
//                        dataIndex: 'email',
//                    },
//                    {
//                        text: 'Phone Number',
//                        flex: 1,
//                    }
//                ];
//
//                var itemsPerPage = pimcore.helpers.grid.getDefaultPageSize(-1);
//
//                var fields = [];
//                this.fieldData = fields;
//
//
//                var plugins = ['pimcore.gridfilters'];
//                this.downloadstore = new pimcore.helpers.grid.buildDefaultStore(
//                        '/admin/DistributionHub/channel/get-download-stats/' + this.channelId,
//                        );
//
////                gridHelper.showSubtype = false;
////                gridHelper.enableEditor = true;
////                gridHelper.limit = 200;
//
////                this.downloadstore.setPageSize(itemsPerPage);
//
//                this.downloadstore.load();
//
////                var gridColumns = gridHelper.getGridColumns();
////                this.gridcolumndata = gridColumns;
////                this.noOfItems = gridHelper.limit;
//
//
//                // grid
//                this.downloadgrid = Ext.create('Ext.grid.Panel', {
//                    frame: false,
//                    store: this.downloadstore,
//                    columns: gridColumns,
////                    maxHeight: 600,
//                    columnLines: true,
//                    autoScroll: true,
//                    scrollable: true,
//                    stripeRows: true,
//                    bodyCls: "pimcore_editable_grid",
//                    border: true,
//                    trackMouseOver: true,
//                    loadMask: true,
//                    plugins: plugins,
//                    viewConfig: {
//                        forceFit: false,
//                        xtype: 'patchedgridview'
//                    },
//                    cls: 'pimcore_object_grid_panel'
//                });
//
//                this.downloadgrid.on("afterrender", function (grid) {
//                    var obj = new pimcore.object.helpers.gridTabAbstract();
////                    if (this.grid.getHeight() > this.grid.maxHeight) {
////                        this.grid.setHeight(this.maxHeight);
////                    }
////                    this.grid.center();
//                }.bind(this));
//
////                this.grid.on("sortchange", function (ct, column, direction, eOpts) {
////                    this.sortinfo = {
////                        field: column.dataIndex,
////                        direction: direction
////                    };
////                }.bind(this));
//
//
////                gridHelper.applyGridEvents(this.grid);
//
//                this.downpagingtoolbar = pimcore.helpers.grid.buildDefaultPagingToolbar(this.downloadstore, {pageSize: itemsPerPage});
//
//                this.channelDataPanel.add(new Ext.Panel({
//                    layout: "fit",
//                    region: "center",
//                    items: [this.downloadgrid],
//                    bbar: this.downpagingtoolbar
//                }));



            }



        });