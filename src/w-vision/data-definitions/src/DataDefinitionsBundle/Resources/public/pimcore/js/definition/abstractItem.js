/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 w-vision AG (https://www.w-vision.ch)
 * @license    https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

pimcore.registerNS('pimcore.plugin.datadefinitions.definition.abstractItem');

pimcore.plugin.datadefinitions.definition.abstractItem = Class.create(coreshop.resource.item, {
    getPanel: function () {
        var me = this,
            panel = new Ext.TabPanel({
                activeTab: 0,
                title: this.data.name + ' (' + this.data.id + ')',
                closable: true,
                deferredRender: false,
                forceLayout: true,
                iconCls: this.iconCls,
                buttons: [
                    {
                        text: t('data_definitions_automap'),
                        xtype: 'splitbutton',
                        iconCls: 'pimcore_icon_manyToOneRelation',
                        hidden: !me.panelKey.startsWith("importdefinitions_import_definition"),
                        menu: [
                            {
                                text: t('data_definitions_automap_exact'),
                                iconCls: "pimcore_icon_manyToOneRelation",
                                handler: this.automapExact.bind(this)
                            },
                            {
                                text: t('data_definitions_automap_fuzzy'),
                                iconCls: "pimcore_icon_manyToOneRelation",
                                handler: this.automapFuzzy.bind(this)
                            }
                        ]
                    },
                    // {
                    //     text: t('data_definitions_import_definition'),
                    //     iconCls: 'pimcore_icon_import',
                    //     handler: this.upload.bind(this)
                    // },
                    // {
                    //     text: t('data_definitions_export_definition'),
                    //     iconCls: 'pimcore_icon_export',
                    //     handler: function () {
                    //         var id = this.data.id;
                    //         pimcore.helpers.download(this.url.export + '?id=' + id);
                    //     }.bind(this)
                    // },
                    // {
                    //     text: t('data_definitions_duplicate_definition'),
                    //     iconCls: 'pimcore_icon_copy',
                    //     handler: function () {
                    //         var id = me.data.id;

                    //         Ext.MessageBox.prompt(t('add'), t('coreshop_enter_the_name'), function (button, value) {
                    //             Ext.Ajax.request({
                    //                 url: me.url.duplicate,
                    //                 jsonData: {
                    //                     id: id,
                    //                     name: value
                    //                 },
                    //                 method: 'post',
                    //                 success: function (response) {
                    //                     var data = Ext.decode(response.responseText);

                    //                     me.parentPanel.grid.getStore().reload();
                    //                     me.parentPanel.refresh();

                    //                     if (!data || !data.success) {
                    //                         Ext.Msg.alert(t('add_target'), t('problem_creating_new_target'));
                    //                     } else {
                    //                         me.parentPanel.openItem(data.data);
                    //                     }
                    //                 }.bind(this)
                    //             });
                    //         }, null, null, '');
                    //     }.bind(this)
                    // },
                    {
                        text: t('save'),
                        iconCls: 'pimcore_icon_apply',
                        handler: this.save.bind(this)
                    }
                ],
                items: this.getItems()
            });

        return panel;
    },

    getItems: function () {
        return [
            this.getSettings(),
            this.getProviderSettings(),
            this.getMappingSettings(),
            this.getImportDownloads()
        ];
    },

    getProviderSettings: function () {
        if (!this.providerSettings) {
            this.providerSettings = Ext.create({
                xtype: 'panel',
                layout: 'border',
                title: t('data_definitions_provider_settings'),
                iconCls: 'data_definitions_icon_provider',
                disabled: true
            });
        }

        if (this.data.provider) {
            this.reloadProviderSettings(this.data.provider);
        }

        return this.providerSettings;
    },

    

    getImportDownloads: function () {
        if (!this.ImportDownloads) {
            this.ImportDownloads = new Ext.grid.Panel({
            frame: false,
            autoScroll: true,
            store: this.store,
            columns: this.getGridColumns(),
            iconCls: 'dHub_schedule',
            trackMouseOver: true,
            columnLines: true,
            stripeRows: true,
            tbar: this.getGridToolbar(),
            viewConfig: {
                forceFit: true
            },
            title: t("Import Downloads")
        });
        }
        return this.ImportDownloads;
    },

    

    /* refreshGrid: function () {
        this.store.reload();
    }, */

    getGridToolbar: function () {

        var toolbar = Ext.create('Ext.Toolbar', {
            cls: 'pimcore_main_toolbar',
            items: [
                {
                    xtype: "button",
                    text: t('add'),
                    iconCls: "pimcore_icon_add",
                    handler: this.openWizard.bind(this),

                },
                {
                    xtype: "button",
                    text: t('refresh'),
                    iconCls: "pimcore_icon_refresh",
                    //handler: this.refreshGrid.bind(this),
                }
            ]
        });

        return toolbar;
    },

    openWizard: function () {
        this.wizardWindow = this.getWizardFormForValues();
        this.wizardWindow.show();
    },

    getWizardFormForValues: function () {

        this.wizardForm = new Ext.form.FormPanel({
            bodyStyle: "padding:10px;",
            defaults: {
                labelWidth: 150
            },
            items: [
                {
                    fieldLabel: t("dHub_name") + ' <span style="color:red;">*</span>',
                    xtype: 'textfield',
                    anchor: '100%',
                    name: 'name',
                    maxLength: 100,
                    maxLengthText: t('dHub_max_allowed_length_100'),
                    allowBlank: false,
                    blankText: t('dHub_field_is_required'),
                    msgTarget: 'under'
                },
            ]
        });

        let wizardWindow = new Ext.Window({
            title: t('dHub_create_schedule'),
            width: 600,
            modal: true,
            items: [this.wizardForm],
            buttons: [{
                    text: t("Import Start"),
                    iconCls: "pimcore_icon_accept",
                    //handler: this.saveWizard.bind(this)
                }]
        });
        return wizardWindow;
    },

    
    getGridColumns: function () {
 
        var typesColumns = [
            {
                text: t("dHub_id"),
                sortable: true,
                hidden: true,
                dataIndex: 'id'
            },
            {
                text: t("dHub_name"),
                width: 140,
                sortable: true,
                dataIndex: 'name'
            },
            {
                text: t("dHub_download_file_name"),
                width: 150,
                sortable: true,
                dataIndex: 'download_file_name'
            },
            {
                text: t("dHub_export_date"),
                width: 130,
                sortable: true,
                dataIndex: "export_date"
            },
            {
                text: t("dHub_export_status"),
                width: 100,
                sortable: true,
                dataIndex: 'export_status'

            },
            {
                text: t("dHub_creation_date"),
                width: 130,
                sortable: true,
                dataIndex: "creation_date"

            },
            {
                text: t("dHub_process_start_time"),
                width: 130,
                sortable: true,
                dataIndex: "process_start_time"

            },
            {
                text: t("dHub_process_end_time"),
                width: 130,
                sortable: true,
                dataIndex: "process_end_time"

            },
            {
                text: t('dHub_file_download_column_header'),
                xtype: 'actioncolumn',
                dataIndex: 'exportFilePimcoreAssetId',
                width: 120,
                renderer: function (value, metadata, record, rowIndex, colIndex, store, view) {
                    if (record.get('exportFilePimcoreAssetId') == null) {
                        this.items[0].icon = "";
                        metadata.style = 'cursor: pointer;';
                    } else {
                        this.items[0].icon = "/bundles/pimcoreadmin/img/icon/download-medium.png";
                        this.items[0].disabled = false;
                    }
                    return '';
                },
                items: [{
                        icon: "/bundles/pimcoreadmin/img/icon/download-medium.png",
                        handler: function (grid, rowIndex, param, button, ) {
                            let exportFilePimcoreAssetId = grid.getStore().getAt(rowIndex).getData().exportFilePimcoreAssetId;
                            
                            if (exportFilePimcoreAssetId) {
                                pimcore.helpers.download("/admin/asset/download?id=" + exportFilePimcoreAssetId);
                            }
                        }.bind(this)
                    }]
            },
            
            
        ];

        return typesColumns;
    },
 
    upload: function (callback) {
        pimcore.helpers.uploadDialog(this.url.upload + '?id=' + this.data.id, 'Filedata', function () {
            this.panel.destroy();
            this.parentPanel.openItem(this.data);
        }.bind(this), function () {
            Ext.MessageBox.alert(t('error'), t('error'));
        });
    },

    getAutomapItems: function () {
        var grid = this.mappingSettings.down('grid');
        var mapping = grid.getStore().getRange();
        var fromColumnItems = [];
        grid.config.columns.items[1].editor.store.data.items.forEach(function (item) {
            fromColumnItems.push(item.data.identifier);
        });
        return {
            grid: grid,
            mapping: mapping,
            fromColumnItems: fromColumnItems,
        };
    },

    automapExact: function (callback) {
        var automap = this.getAutomapItems();
        automap.mapping.forEach(function (map) {
            if (automap.fromColumnItems.indexOf(map.data.toColumn) > -1) {
                map.data.fromColumn = map.data.toColumn;
            }
        });
        automap.grid.getView().refresh();
    },

    automapFuzzy: function (callback) {
        var automap = this.getAutomapItems();
        var options = {
            shouldSort: true,
            findAllMatches: true,
            includeScore: true,
            threshold: 0.7,
            location: 0,
            distance: 100,
            maxPatternLength: 32,
            minMatchCharLength: 1
        };
        var fuse = new Fuse(automap.fromColumnItems, options);
        automap.mapping.forEach(function (map) {
            result = fuse.search(map.data.toColumn)[0];
            if (result !== undefined) {
                if (!(['o_published', 'o_key', 'o_parentId', 'o_parent', 'o_type'].indexOf(map.data.toColumn) > -1 && result.score > 0.5)) {
                    map.data.fromColumn = automap.fromColumnItems[result.item];
                }
            }
        });
        automap.grid.getView().refresh();
    }
});
