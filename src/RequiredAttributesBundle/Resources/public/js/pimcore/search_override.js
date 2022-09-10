pimcore.registerNS("pimcore.plugin.RequiredAttributesBundle.search_override");


pimcore.plugin.RequiredAttributesBundle.search_override = Class.create({
    customizeCreateGrid: function(){
        Ext.override(pimcore.object.search, {
            createGrid: function (fromConfig, response, settings, save) {
                var itemsPerPage = pimcore.helpers.grid.getDefaultPageSize(-1);
        
                var fields = [];
        
                if (response.responseText) {
                    response = Ext.decode(response.responseText);
        
                    if (response.pageSize) {
                        itemsPerPage = response.pageSize;
                    }
        
                    fields = response.availableFields;
                    this.gridLanguage = response.language;
                    this.gridPageSize = response.pageSize;
                    this.sortinfo = response.sortinfo;
        
                    this.settings = response.settings || {};
                    this.availableConfigs = response.availableConfigs;
                    this.sharedConfigs = response.sharedConfigs;
        
                    if (response.onlyDirectChildren) {
                        this.onlyDirectChildren = response.onlyDirectChildren;
                    }
                } else {
                    itemsPerPage = this.gridPageSize;
                    fields = response;
                    this.settings = settings;
                    this.buildColumnConfigMenu();
                }
        
                this.fieldObject = {};
                for (var i = 0; i < fields.length; i++) {
                    this.fieldObject[fields[i].key] = fields[i];
                }
                this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
                        clicksToEdit: 0,
                        listeners: {
                            beforeedit: function (editor, context, eOpts) {
                                //need to clear cached editors of cell-editing editor in order to
                                //enable different editors per row
                                var editors = editor.editors;
                                editors.each(function (editor) {
                                    
                                    if (typeof editor.column.config.getEditor !== "undefined") {
                                        Ext.destroy(editor);
                                        editors.remove(editor);
                                    }
                                });
                            }
                        }
                    }
                );
        
                // get current class
                var classStore = pimcore.globalmanager.get("object_types_store");
                var klass = classStore.getById(this.classId);
        
                var baseParams;
        
                var existingFilters;
                if (this.store) {
                    existingFilters = this.store.getFilters();
                    baseParams = this.store.getProxy().getExtraParams();
                } else {
                    baseParams = {};
                }
        
                Ext.apply(baseParams, {
                    language: this.gridLanguage,
                });
        
                var gridHelper = new pimcore.object.helpers.grid(
                    klass.data.text,
                    fields,
                    "/admin/object/grid-proxy?classId=" + this.classId + "&folderId=" + this.object.id,
                    baseParams,
                    false
                );
        
                gridHelper.showSubtype = false;
                gridHelper.enableEditor = true;
                gridHelper.limit = itemsPerPage;
        
                var enableGridLocking = klass.get("enableGridLocking");
        
                this.store = gridHelper.getStore(this.noBatchColumns, this.batchAppendColumns, this.batchRemoveColumns);
                if (this.sortinfo) {
                    this.store.sort(this.sortinfo.field, this.sortinfo.direction);
                }
                this.store.getProxy().setExtraParam("only_direct_children", this.onlyDirectChildren);
                this.store.setPageSize(itemsPerPage);
        
                if (existingFilters && fromConfig) {
                    this.store.setFilters(existingFilters.items);
                }
        
                var gridColumns = gridHelper.getGridColumns();
        
                var needGridFilter = false;
        
                // gridfilter plugin does not load the store if there are no filter columns.
                // so if there are no filter columns, then don't add the plugin
                // however, in this case we have to load the store manually
                if (gridColumns) {
                    for (let i = 0; i < gridColumns.length; i++) {
                        let col = gridColumns[i];
                        if (col.filter) {
                            needGridFilter = true;
                            break;
                        }
                    }
                }
        
                var plugins = [this.cellEditing];
                if (needGridFilter) {
                    plugins.push('pimcore.gridfilters');
                }
        
                if (!needGridFilter) {
                    this.store.load();
                }
        
                // grid
                this.grid = Ext.create('Ext.grid.Panel', {
                    frame: false,
                    store: this.store,
                    bufferedRenderer: false,
                    runInViewport: false,
                    columns: gridColumns,
                    columnLines: true,
                    enableLocking: enableGridLocking,
                    stripeRows: true,
                    bodyCls: "pimcore_editable_grid",
                    border: true,
                    selModel: gridHelper.getSelectionColumn(),
                    trackMouseOver: true,
                    loadMask: true,
                    plugins: plugins,
                    viewConfig: {
                        forceFit: false,
                        xtype: 'patchedgridview',
                        enableTextSelection: true
                    },
                    listeners: {
                        celldblclick: function(grid, td, cellIndex, record, tr, rowIndex, e, eOpts) {
                            var columnName = grid.ownerGrid.getColumns();
                            if(columnName[cellIndex].dataIndex == 'id' || columnName[cellIndex].dataIndex == 'fullpath') {
                                var data = this.store.getAt(rowIndex);
                                pimcore.helpers.openObject(data.get("id"), data.get("type"));
                            }
                        }
                    },
                    cls: 'pimcore_object_grid_panel',
                    tbar: this.getToolbar(fromConfig, save)
                });
        
                this.grid.on("columnmove", function () {
                    this.saveColumnConfigButton.show()
                }.bind(this));
                this.grid.on("columnresize", function () {
                    this.saveColumnConfigButton.show()
                }.bind(this));
                this.grid.on("lockcolumn", function () {
                    this.saveColumnConfigButton.show()
                }.bind(this));
                this.grid.on("unlockcolumn", function () {
                    this.saveColumnConfigButton.show()
                }.bind(this));
        
                this.grid.on("rowcontextmenu", this.onRowContextmenu);
        
                this.grid.on("afterrender", function (grid) {
                    if (grid.enableLocking) {
                        var grids = grid.items.items;
                        for (var i = 0; i < grids.length; i++) {
                            this.updateGridHeaderContextMenu(grids[i]);
                        }
                    } else {
                        this.updateGridHeaderContextMenu(grid);
                    }
                }.bind(this));
        
                this.grid.on("sortchange", function (ct, column, direction, eOpts) {
                    this.sortinfo = {
                        field: column.dataIndex,
                        direction: direction
                    };
                }.bind(this));
        
                // check for filter updates
                this.grid.on("filterchange", function () {
                    this.filterUpdateFunction(this.grid, this.toolbarFilterInfo, this.clearFilterButton);
                }.bind(this));
        
                gridHelper.applyGridEvents(this.grid);
        
                this.pagingtoolbar = pimcore.helpers.grid.buildDefaultPagingToolbar(this.store, {pageSize: itemsPerPage});
        
                this.editor = new Ext.Panel({
                    layout: "border",
                    items: [new Ext.Panel({
                        items: [this.grid],
                        region: "center",
                        layout: "fit",
                        bbar: this.pagingtoolbar
                    })]
                });
        
                this.layout.removeAll();
                this.layout.add(this.editor);
                this.layout.updateLayout();
        
                if (save) {
                    if (this.settings.isShared) {
                        this.settings.gridConfigId = null;
                    }
                    this.saveConfig(false);
                }
            },
        });
    }

    
})