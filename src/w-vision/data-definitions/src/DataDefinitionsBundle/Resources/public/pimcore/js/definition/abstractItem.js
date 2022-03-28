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

        /*  below code lines are commented to avoid overlapping of provider settings. Because that setting panel is already created */
        /*if (this.data.provider) {
            this.reloadProviderSettings(this.data.provider);
        }*/

        return this.providerSettings;
    },

    getImportDownloads: function () {

        if (!this.grid) {

            this.store = new Ext.data.JsonStore({
                proxy: {
                    type: 'ajax',
                    url: '/admin/data_definitions/import_definitions/importList',
                    extraParams: {
                        importDefinitionId: this.data.id
                    },
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                },
                fields: ["id", "name", "process_start_time", "process_end_time", "importFilePimcoreAssetId", "export_status", "creation_date"],
               
            });
            this.store.load();

            this.grid = new Ext.grid.Panel({
                frame: false,
                autoScroll: true,
                store: this.store,
                columns: this.getGridColumns(),
                iconCls: 'data_definition_import',
                trackMouseOver: true,
                columnLines: true,
                stripeRows: true,
                tbar: this.getGridToolbar(),
                viewConfig: {
                    forceFit: true
                },
                title: t("Import Downloads")
            });

            // set refresh time in milliseconds 
            let refreshTime = 5 * 1000;
            Ext.TaskManager.start({
                    run: function () {
                        this.refreshGrid();
                    },
                    interval: refreshTime,
                    scope: this
                });
        }
        return this.grid;
    },

    refreshGrid: function () {
        this.store.reload();
    },

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
                    handler: this.refreshGrid.bind(this),
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
                    fieldLabel: t("data_definition_name") + ' <span style="color:red;">*</span>',
                    xtype: 'textfield',
                    anchor: '100%',
                    name: 'name',
                    maxLength: 100,
                    maxLengthText: t('data_definition_max_allowed_length_100'),
                    allowBlank: false,
                    blankText: t('data_definition_field_is_required'),
                    msgTarget: 'under'
                },
            ]
        });

        let wizardWindow = new Ext.Window({
            title: t('data_definition_create_import'),
            width: 600,
            modal: true,
            items: [this.wizardForm],
            buttons: [{
                text: t("Start Import"),
                iconCls: "pimcore_icon_accept",
                handler: this.saveWizard.bind(this)
            }]
        });
        return wizardWindow;
    },


    getGridColumns: function () {

        var typesColumns = [
            {
                text: t("data_definition_import_id"),
                sortable: true,
                hidden: true,
                dataIndex: 'id'
            },
            {
                text: t("data_definition_import_name"),
                width: '30%',
                sortable: true,
                dataIndex: 'name'
            },
            {
                text: t("data_definition_import_status"),
                width: '15%',
                sortable: true,
                dataIndex: 'import_status'

            },
            {
                text: t("data_definition_creation_date"),
                width: '15%',
                sortable: true,
                dataIndex: "creation_date"

            },
            {
                text: t("data_definition_process_start_time"),
                width: '15%',
                sortable: true,
                dataIndex: "process_start_time"

            },
            {
                text: t("data_definition_process_end_time"),
                width: '15%',
                sortable: true,
                dataIndex: "process_end_time"

            },
            {
                text: t('data_definition_download_log_file'),
                xtype: 'actioncolumn',
                dataIndex: 'logFilePimcoreAssetId',
                width: '10%',
                renderer: function (value, metadata, record, rowIndex, colIndex, store, view) {
                    if (record.get('logFilePimcoreAssetId') == null) {
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
                    handler: function (grid, rowIndex, param, button,) {
                        let logFilePimcoreAssetId = grid.getStore().getAt(rowIndex).getData().logFilePimcoreAssetId;

                        if (logFilePimcoreAssetId) {
                            pimcore.helpers.download("/admin/asset/download?id=" + logFilePimcoreAssetId);
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
    },

    isValid: function () {
        return true;
    },

    saveWizard: function () {

        let form = this.wizardForm;
        let outerScope = this;
        let values = form.getForm().getFieldValues();
        if (form.isValid()) {

            form.submit({
                url: '/admin/data_definitions/import_definitions/saveImport',
                method: 'POST',
                waitMsg: t('data_definition_import_processing'),
                params: {
                    importDefinitionId: this.data.id
                },
                success: function (form, response) {
                    response = response.response;
                    response = Ext.decode(response.responseText);
                    outerScope.grid.store.insert(0, response);
                },
                failure: function (form, response) {
                    response = response.response;
                    response = Ext.decode(response.responseText);

                    Ext.MessageBox.alert(t('data_failure'), response.msg);
                }
            });

            this.wizardWindow.hide();
        }
    }
});
