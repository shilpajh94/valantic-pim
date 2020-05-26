pimcore.registerNS("pimcore.plugin.CatalogBundle");

pimcore.plugin.CatalogBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.CatalogBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert('override');
        Ext.override(pimcore.object.tags.table,{
            initGrid: function () {

                this.component.removeAll();

                var data = this.store.queryBy(function (record, id) {
                    return true;
                });
                var columns = [];

                var fields = this.store.getInitialConfig().fields;

                if (data.items[0]) {
                    for (var i = 0; i < fields.length; i++) {
                        columns.push({
text: this.fieldConfig.columnConfigActivated && this.fieldConfig.columnConfig[i] ? ts(this.fieldConfig.columnConfig[i].label) : '',
                    dataIndex: fields[i].name,
                    editor: new Ext.form.TextField(),
                    sortable: false,
                    flex: 1
                            

                        });
                    }
                }

                this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {});

                var tbar = [];

                if (!this.fieldConfig.colsFixed || columns.length < this.fieldConfig.cols) {
                    tbar.push({
                        iconCls: "pimcore_icon_table_col pimcore_icon_overlay_add",
                        handler: this.addColumn.bind(this)
                    });
                }

                if (!this.fieldConfig.colsFixed || columns.length > this.fieldConfig.cols) {
                    tbar.push({
                        iconCls: "pimcore_icon_table_col pimcore_icon_overlay_delete",
                        handler: this.deleteColumn.bind(this)
                    });
                }

                if (!this.fieldConfig.rowsFixed || data.length != this.fieldConfig.rows) {
                    tbar.push({
                        iconCls: "pimcore_icon_table_row pimcore_icon_overlay_delete",
                        handler: this.deleteRow.bind(this)
                    });
		
                    tbar.push({
                        iconCls: "pimcore_icon_table_row pimcore_icon_overlay_add",
                        handler: this.addRow.bind(this)
                    });
                }

tbar.push({
            iconCls: "pimcore_icon_paste",
            handler: this.pasteFromClipboard.bind(this)
        });
        tbar.push({
            iconCls: "pimcore_icon_empty",
            handler: this.emptyStore.bind(this)
        });

        // customization -- starts
        if(this.fieldConfig.name == "ProductsData"){
            this.grid = Ext.create('Ext.grid.Panel', {
                store: this.store,
                columns: columns,
                stripeRows: true,
                columnLines: true,
                bodyCls: "pimcore_editable_grid",
                autoHeight: true,
                selModel: Ext.create('Ext.selection.CellModel'),
                hideHeaders: false,
                enableColumnHide: false,
                // plugins: [
                //     this.cellEditing
                // ],
                tbar: tbar,
                viewConfig: {
                    forceFit: true
                }
            });

            this.grid.on("reconfigure", function (scope, newStore, newColumns, oldStore, oldColumns, eOpts) {
                this.dirty = true;
                this.store = newStore;
            }.bind(this));

        }else{
            this.grid = Ext.create('Ext.grid.Panel', {
                store: this.store,
                columns: columns,
                stripeRows: true,
                columnLines: true,
                bodyCls: "pimcore_editable_grid",
                autoHeight: true,
                selModel: Ext.create('Ext.selection.CellModel'),
                hideHeaders: true,
                plugins: [
                    this.cellEditing
                ],
                tbar: tbar,
                viewConfig: {
                    forceFit: true
                }
            });
        }
        // customization -- ends

        // default pimcore implementation -- starts
        // this.grid = Ext.create('Ext.grid.Panel', {
        //     store: this.store,
        //     columns: columns,
        //     stripeRows: true,
        //     columnLines: true,
        //     bodyCls: "pimcore_editable_grid",
        //     autoHeight: true,
        //     selModel: Ext.create('Ext.selection.CellModel'),
        //     hideHeaders: true,
        //     plugins: [
        //         this.cellEditing
        //     ],
        //     tbar: tbar,
        //     viewConfig: {
        //         forceFit: true
        //     }
        // });
        // default pimcore implementation -- ends

        this.component.add(this.grid);
        this.component.updateLayout();
    },
    initStore: function (data) {
        var storeFields = [];
        if (data[0]) {
            for (var i = 0; i < data[0].length; i++) {
                storeFields.push({
                    name: "col_" + i
                });
            }
        }

        this.store = new Ext.data.ArrayStore({
            fields: storeFields
        });

        this.store.loadData(data);

        this.store.on("update", function () {
            console.log("update event");
            this.dirty = true;
        }.bind(this));

        // customization -- open
        this.store.on("add", function (store,records,index,eOpts) {;
            this.dirty = true;
        }.bind(this));


        this.store.on("remove", function () {
            this.dirty = true;
        }.bind(this));
        
        // customization -- closed

        this.initGrid();
    },
});

    },
    postOpenObject: function (object, type) {
        let objectClassName = object.data.general.o_className;

        //let helper = new pimcore.plugin.lpeHelper();
        if(objectClassName == 'CatalogTables'){
            var headerSelection = new pimcore.plugin.headerSelection();
            headerSelection.attachHeader(object, type);

            let formatterGridHandler = new pimcore.plugin.formattedGridHandler(object);
            formatterGridHandler.setUpFormattedGrid();
        }
    }
});

var CatalogBundlePlugin = new pimcore.plugin.CatalogBundle();
