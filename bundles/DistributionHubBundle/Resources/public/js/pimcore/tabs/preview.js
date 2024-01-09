pimcore.registerNS("pimcore.plugin.distributionhub.tabs.preview");
pimcore.plugin.distributionhub.tabs.preview = Class.create(pimcore.bundle.distributionhub.filtersConfig.resultAbstractPanel, {

    initialize: function (getSaveDataCallback, gridConfigData, portletMode) {
        this.getSaveDataCallback = getSaveDataCallback;
        this.settings = {};
        this.element = {};
        this.gridPageSize = 25;

        if (gridConfigData) {
            this.gridConfigData = gridConfigData.filterConfig;
            this.showInGrid = gridConfigData.showInGridMapping;
        }

        this.portletMode = portletMode;

        if (!this.portletMode) {
            this.extensionBag = new pimcore.bundle.distributionhub.filtersConfig.ResultPanelExtensionBag(this, typeof gridConfigData != 'undefined' ? gridConfigData.predefinedFilter : null);
            pimcore.plugin.broker.fireEvent("onDHubPreviewResult", this.extensionBag);
        }
    },

    getLayout: function (initialFilter) {

        this.initialFilter = initialFilter;

        if (this.layout == null) {
            this.layout = new Ext.Panel({
                border: false,
                layout: "fit",
                listeners: {
                    activate: function () {

                        var classId = null;
                        var language = null;
                        var updatedShowInGrid = null;
                        if (this.initialFilter) {
                            classId = this.initialFilter.classId;
                        } else if (this.getSaveDataCallback) {
                            this.previewConfig = this.getSaveDataCallback(true);
                            classId = this.previewConfig.classId;
                            language = this.previewConfig.lang;
                            updatedShowInGrid = this.previewConfig.showInGrid;

                        }

                        if (classId) {
                            this.updateGrid(classId, language, updatedShowInGrid);
                        } else {
                            // Load an empty grid, incase there is no class selected
                            this.emptyGrid = Ext.create('Ext.grid.Panel', {
                                title: t('dHub_class_not_selected'),
                                columns: [
                                    {text: t('dHub_column_na'), width: 300}
                                ],
                                trackMouseOver: true,
                                viewConfig: {
                                    forceFit: true
                                },
                                renderTo: Ext.getBody()
                            });

                            this.layout.removeAll();
                            this.layout.add(this.emptyGrid);
                            this.layout.updateLayout();

                            Ext.MessageBox.alert(t('dHub_class_not_selected'), t('dHub_class_not_available_error_preview'));
                        }
                    }.bind(this)
                }
            });
            if (!this.portletMode) {
                this.layout.setTitle(t('dHub_results'));
                this.layout.setIconCls('dHub_preview_grid');

                this.layout.on("destroy", function () {
                    this.extensionBag.destroy();
                    this.extensionBag = null;
                }.bind(this));
            }

        }

        return this.layout;
    },

    updateGrid: function (classId, language, updatedShowInGrid) {
        this.classId = classId;
        var classStore = pimcore.globalmanager.get("object_types_store");

        var classRecord = classStore.getById(this.classId);
       //var classRecord = classStore.findRecord("id", this.classId);
        if (classRecord) {
            this.selectedClass = classRecord.data.text;

            if (language) {
                this.gridLanguage = language;
                if (updatedShowInGrid) {
                    this.updatedGrid = Ext.decode(updatedShowInGrid);
                    this.createGrid(false, this.updatedGrid);

                } else {
                    var response = null;
                    Ext.Ajax.request({
                        url: "/admin/object-helper/grid-get-column-config",
                        params: {name: this.selectedClass, gridtype: "grid"},
                        success: function (response) {
                            response = Ext.decode(response.responseText);
                            var settings = response.settings || {};

                            this.createGrid(false, response, settings, this.gridConfigData);
                        }.bind(this)
                    });
                }

            } else {
                Ext.Ajax.request({
                    url: "/admin/object-helper/grid-get-column-config",
                    params: {name: this.selectedClass, gridtype: "grid"},
                    success: this.createGrid.bind(this, false)
                });
            }
        }

    },

    getTableDescription: function () {
        Ext.Ajax.request({
            url: "/admin/object-helper/grid-get-column-config",
            params: {
                id: this.classId,
                gridtype: "grid",
                gridConfigId: this.settings ? this.settings.gridConfigId : null,
                searchType: this.searchType
            },
            success: this.createGrid.bind(this, false)
        });
    },

    createGrid: function (fromConfig, response, settings, predefinedCols) {
        var fields = [];

        var itemsPerPage = this.gridPageSize;

        if (Ext.decode(response.responseText)) {
            response = Ext.decode(response.responseText);

            if (response.pageSize) {
                this.gridPageSize = response.pageSize;
                itemsPerPage = response.pageSize;
            }

            fields = response.availableFields;
            this.gridLanguage = response.language;

            this.settings = response.settings || {};
            this.availableConfigs = response.availableConfigs;
            this.sharedConfigs = response.sharedConfigs;
        }

        if (response.availableFields) {
            if (response.pageSize) {
                this.gridPageSize = response.pageSize;
                itemsPerPage = response.pageSize;
            }

            fields = response.availableFields;
            this.gridLanguage = response.language;
            this.fields = fields;
            this.settings = response.settings || {};
            this.availableConfigs = response.availableConfigs;
            this.sharedConfigs = response.sharedConfigs;
        } else {
            fields = response.columns;
            this.fields = fields;
            this.settings = settings;
            if (this.columnConfigButton) {
                this.buildColumnConfigMenu(true);
            }
        }

        this.fieldObject = {};
        for (var i = 0; i < fields.length; i++) {
            this.fieldObject[fields[i].key] = fields[i];
        }

        var gridHelper = new pimcore.object.helpers.grid(
                this.selectedClass,
                fields,
                "/admin/distributionhub/filters/grid-proxy?classId=" + this.classId,
                {
                    language: this.gridLanguage
                },
                false
                );

        gridHelper.showSubtype = false;
        gridHelper.showKey = true;
        gridHelper.enableEditor = false;
        gridHelper.limit = itemsPerPage;

        this.store = gridHelper.getStore(this.noBatchColumns, this.batchAppendColumns, this.batchRemoveColumns);
        this.store.setPageSize(itemsPerPage);


        var gridColumns = this.getGridColumns();

        gridColumns.push({
            hideable: false,
            xtype: 'actioncolumn',
            width: 40,
            items: [
                {
                    tooltip: t('open'),
                    icon: "/bundles/pimcoreadmin/img/flat-color-icons/cursor.svg",
                    handler: function (grid, rowIndex) {
                        var data = grid.getStore().getAt(rowIndex);
                        pimcore.helpers.openObject(data.id);
                    }.bind(this)
                }
            ]
        });

        this.pagingtoolbar = pimcore.helpers.grid.buildDefaultPagingToolbar(this.store, {pageSize: itemsPerPage});

        this.languageInfo = new Ext.Toolbar.TextItem({
            text: t("grid_current_language") + ": " + pimcore.available_languages[this.gridLanguage]
        });

        this.toolbarFilterInfo = new Ext.Button({
            iconCls: "pimcore_icon_filter_condition",
            hidden: true,
            text: '<b>' + t("filter_active") + '</b>',
            tooltip: t("filter_condition"),
            handler: function (button) {
                Ext.MessageBox.alert(t("filter_condition"), button.pimcore_filter_condition);
            }.bind(this)
        });

        var tbars = [];
        var plugins = [];

        if (!this.portletMode) {
            var tbar = [this.languageInfo, '-', this.toolbarFilterInfo];
            var secondaryTbar = [];

            if (this.extensionBag.getExtensions().length) {
                this.extensionBag.getExtensions().forEach(function (extension) {
                    if (extension.isInSecondaryTbar()) {
                        secondaryTbar.push(extension.getLayout());
                    } else {
                        tbar.push(extension.getLayout());
                    }
                }.bind(this));
            }

            this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
                clicksToEdit: 0
            });
            plugins.push(this.cellEditing);
 
            tbar = tbar.concat(['->', "-"
            ]);

            tbars = [{
                    xtype: 'toolbar',
                    dock: 'top',
                    items: tbar
                }];

            if (secondaryTbar.length) {
                tbars.unshift(
                        {
                            xtype: 'toolbar',
                            dock: 'top',
                            items: secondaryTbar
                        }
                );
            }
        }

        this.grid = Ext.create('Ext.grid.Panel', {
            frame: false,
            autoScroll: true,
            store: this.store,
            border: true,
            columns: gridColumns,
            columnLines: true,
            plugins: plugins,
            stripeRows: true,
            trackMouseOver: true,
            viewConfig: {
                forceFit: true
            },
            sortableColumns: false,
            bbar: this.pagingtoolbar,
            dockedItems: tbars
        });

        this.grid.on("rowcontextmenu", this.onRowContextmenu.bind(this));
        this.grid.on("sortchange", function (grid, sortinfo) {
            this.sortinfo = sortinfo;
        }.bind(this));

        // check for filter updates
        this.grid.on("filterchange", function () {
            this.filterUpdateFunction(this.grid, this.toolbarFilterInfo);
        }.bind(this));

        gridHelper.applyGridEvents(this.grid);

        var proxy = this.store.getProxy();

        if (this.initialFilter) {
            delete this.initialFilter.gridConfig;
            proxy.extraParams.filter = Ext.encode(this.initialFilter);
            this.initialFilter = null;
        } else {
            var cleansedParams = this.previewConfig;
            delete cleansedParams['showInGrid'];

            proxy.extraParams.filter = JSON.stringify(cleansedParams);
        }

        if (this.extensionBag) {
            this.extensionBag.addCustomFilter();
        }

        this.store.load();

        this.layout.removeAll();
        this.layout.add(this.grid);
        this.layout.updateLayout();
    },

    getColumnWidth: function (field, defaultValue) {
        if (field.width) {
            return field.width;
        } else if (field.layout && field.layout.width) {
            return field.layout.width;
        } else {
            return defaultValue;
        }
    },

    getColumnLock: function (field) {
        return false;
    },

    getGridColumns: function () {
        // init grid-columns
        var gridColumns = [];

        var fields = this.fields;

        for (var i = 0; i < fields.length; i++) {
            var field = fields[i];
            if (field.key !== null) {
                if (field.key == "id") {
                    gridColumns.push({text: 'ID', width: this.getColumnWidth(field, this.getColumnWidth(field, 60)), sortable: false,
                        dataIndex: 'id', filter: 'numeric', locked: this.getColumnLock(field)});
                } else if (field.key == "published") {
                    gridColumns.push(new Ext.grid.column.Check({
                        text: t("published"),
                        width: 40,
                        sortable: true,
                        filter: 'boolean',
                        editable: false,
                        disabled: true,
                        tdCls: 'x-item-disabled',
                        dataIndex: "published",
                        locked: this.getColumnLock(field)
                    }));
                } else if (field.key == "fullpath") {
                    gridColumns.push({text: t("path"), width: this.getColumnWidth(field, 100), sortable: false,
                        dataIndex: 'fullpath', filter: "string", locked: this.getColumnLock(field)});
                } else if (field.key == "filename") {
                    gridColumns.push({text: t("filename"), width: this.getColumnWidth(field, 100), sortable: false,
                        dataIndex: 'filename', hidden: !showKey, locked: this.getColumnLock(field)});
                } else if (field.key == "key") {
                    gridColumns.push({text: t("key"), width: this.getColumnWidth(field, 100), sortable: false,
                        dataIndex: 'key', hidden: !showKey, filter: 'string', locked: this.getColumnLock(field)});
                } else if (field.key == "classname") {
                    gridColumns.push({text: t("class"), width: this.getColumnWidth(field, 100), sortable: false,
                        dataIndex: 'classname', locked: this.getColumnLock(field), renderer: function (v) {
                            return t(v);
                        }/*, hidden: true*/});
                } else if (field.key == "creationDate") {
                    gridColumns.push({text: t("creationdate") + " (System)", width: this.getColumnWidth(field, 100), sortable: false,
                        dataIndex: "creationDate", filter: 'date', editable: false, locked: this.getColumnLock(field), renderer: function (d) {
                            return Ext.Date.format(d, "Y-m-d H:i:s");
                        }/*, hidden: !propertyVisibility.creationDate*/});
                } else if (field.key == "modificationDate") {
                    gridColumns.push({text: t("modificationdate") + " (System)", width: this.getColumnWidth(field, 100), sortable: false,
                        dataIndex: "modificationDate", filter: 'date', editable: false, locked: this.getColumnLock(field), renderer: function (d) {

                            return Ext.Date.format(d, "Y-m-d H:i:s");
                        }/*, hidden: !propertyVisibility.modificationDate*/});
                } else {
                    if (fields[i].isOperator) {
                        var operatorColumnConfig = {text: field.attributes.label ? field.attributes.label : field.attributes.key, width: field.width ? field.width : 100, locked: this.getColumnLock(field), sortable: false,
                            dataIndex: fields[i].key, editable: true};

                        if (field.attributes.renderer && pimcore.object.tags[field.attributes.renderer]) {
                            var tag = new pimcore.object.tags[field.attributes.renderer]({}, {});
                            var fc = tag.getGridColumnConfig({
                                key: field.attributes.key
                            });
                            operatorColumnConfig["renderer"] = fc.renderer;
                        }


                        operatorColumnConfig.getEditor = function () {
                            return new pimcore.element.helpers.gridCellEditor({
                                fieldInfo: {
                                    layout: {
                                        noteditable: true
                                    }
                                }
                            });
                        }.bind(this);

                        gridColumns.push(operatorColumnConfig);

                    } else {
                        var fieldType = fields[i].type;
                        var tag = pimcore.object.tags[fieldType];
                        if (tag) {
                            var fc = tag.prototype.getGridColumnConfig(field);
                            fc.width = this.getColumnWidth(field, 100);
                            
                            if (this.isSearch) {
                                fc.sortable = false;
                            }

                            fc.locked = this.getColumnLock(field);

                            gridColumns.push(fc);
                            gridColumns[gridColumns.length - 1].hidden = false;
                            gridColumns[gridColumns.length - 1].layout = fields[i];
                        } else {
                            console.log("could not resolve field type: " + fieldType);
                        }
                    }
                }
            }

        }

        return gridColumns;
    },
    onRowContextmenu: function (grid, record, tr, rowIndex, e, eOpts) {

        var menu = new Ext.menu.Menu();
        var data = grid.getStore().getAt(rowIndex);
        var selectedRows = grid.getSelectionModel().getSelection();

        if (selectedRows.length <= 1) {

            menu.add(new Ext.menu.Item({
                text: t('open'),
                iconCls: "pimcore_icon_open",
                handler: function (data) {
                    pimcore.helpers.openObject(data.data.id, "object");
                }.bind(this, data)
            }));
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
        }

        e.stopEvent();
        menu.showAt(e.pageX, e.pageY);
    }
});
