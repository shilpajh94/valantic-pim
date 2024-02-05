pimcore.registerNS("pimcore.plugin.RestApiBundle");

pimcore.plugin.RestApiBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.RestApiBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("RestApiBundle ready!");
    },
    
    postOpenObject: function (object, type) {
        let objectClassName = object.data.general.o_className;
        if (objectClassName == 'VirtualCatalogApiMapper') {

            Ext.Ajax.request({
                url: "/virtual_catalog/get_mapper_data/",
                method: 'GET',
                async: false,
                params: { 'table': object.edit.dataFields.GroupingField.component.getValue(), objId: object.id },
                success: function (response) {
                    response = Ext.decode(response.responseText);

                    store = Ext.create('Ext.data.Store', {
                        fields: response.fieldData,
                        data: { 'items': response.data },
                        //   data    : {'items':[["1","1"],['2','2']]},

                        proxy: {
                            type: 'memory',
                            reader: {
                                //  xtype: 'grid',
                                type: 'json',
                                rootProperty: 'items'
                            }
                        },
                        header: true
                    });
                    columns = response.columnData;
                    data = response.data;

                    var table = new RestAPI.pimcore.object.tags.table([], object.edit.dataFields.originalValues.fieldConfig);
                    var comp = Ext.getCmp(object.edit.dataFields.originalValues.component.id);

                    table.initStore(data, comp, object.edit.dataFields.originalValues, columns);

                    // var table = new RestAPI.pimcore.object.tags.table([], object.edit.dataFields.valueAlias.fieldConfig);
                    // var comp = Ext.getCmp(object.edit.dataFields.valueAlias.component.id);

                    // table.initStore(response.newdata, comp, object.edit.dataFields.valueAlias, response.newcolumnData);
                }
            });


            object.edit.dataFields.GroupingField.component.on('select', function (event) {
                Ext.Ajax.request({
                    url: "/virtual_catalog/get_mapper_data/",
                    method: 'GET',
                    async: false,
                    params: { 'table': object.edit.dataFields.GroupingField.component.getValue(), objId: object.id },
                    success: function (response) {
                        response = Ext.decode(response.responseText);

                        store = Ext.create('Ext.data.Store', {
                            fields: response.fieldData,
                            data: { 'items': response.data },
                            //   data    : {'items':[["1","1"],['2','2']]},

                            proxy: {
                                type: 'memory',
                                reader: {
                                    //  xtype: 'grid',
                                    type: 'json',
                                    rootProperty: 'items'
                                }
                            },
                            header: true
                        });
                        columns = response.columnData;
                        data = response.data;

                        console.log(columns);

                        var table = new RestAPI.pimcore.object.tags.table([], object.edit.dataFields.originalValues.fieldConfig);
                        var comp = Ext.getCmp(object.edit.dataFields.originalValues.component.id);

                        table.initStore(data, comp, object.edit.dataFields.originalValues, columns);

                        //     var table = new RestAPI.pimcore.object.tags.table([], object.edit.dataFields.valueAlias.fieldConfig);
                        //     var comp = Ext.getCmp(object.edit.dataFields.valueAlias.component.id);

                        //     table.initStore(response.newdata, comp, object.edit.dataFields.valueAlias, response.newcolumnData);
                    }
                });
            });

            // let formatterGridHandler = new pimcore.plugin.formattedGridHandlerMapper(object);
            // formatterGridHandler.setUpFormattedGrid();
        }
        if (objectClassName == 'VirtualCatalogApiSorter') {
            var colComp = Ext.getCmp(object.edit.dataFields.Columns.component.id);
            colComp.hide();
            var store;
            var columns;
            var data;

            var storeData = [];
            var completeData = [];

            if (object.data.data.GroupingField !== null) {

                object.edit.dataFields.GroupingField.component.setValue(object.data.data.GroupingField);
            }
            if ((object.data.data.GroupingField !== null && trim(object.data.data.GroupingField) !== "")) {
                var headerSorter = new pimcore.plugin.headerSorter();
                headerSorter.attachHeader(object, type, { 'value': object.data.data.GroupingField }, null, 0);
            }

            object.edit.dataFields.GroupingField.component.on('select', function (event) {
                //console.log(object.data.data.GroupingField);
                //   if(object.data.data.GroupingField != event.value)
                {
                    var headerSorter = new pimcore.plugin.headerSorter();
                    headerSorter.attachHeader(object, type, event, null, 1);
                }
            });



        }
    }
});


var RestApiBundlePlugin = new pimcore.plugin.RestApiBundle();


Ext.define('RestAPI.pimcore.object.tags.table', {
    extend: 'pimcore.object.tags.table',
    initStore: function (data, comp, field, columnArr) {
        if (data !== null) {
            this.component = comp;
            var storeFields = [];
            if (data[0]) {
                for (var i = 0; i < data[0].length; i++) {
                    storeFields.push({
                        name: columnArr[i].name
                    });
                }
            }

            this.store = new Ext.data.ArrayStore({
                fields: storeFields
            });

            this.store.loadData(data);

            field.data = data;
            field.dirty = true;
            field.store = this.store;
            this.initGrid(comp, columnArr);
        }
    },

    initGrid: function (comp, columnArr) {
        this.component = comp;
        this.component.removeAll();

        var data = this.store.queryBy(function (record, id) {
            return true;
        });

        var columns = [];

        var fields = this.store.getInitialConfig().fields;

        columns = columnArr;
        this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {});

        var tbar = [];
        if (this.fieldConfig.name == "ProductsData") {
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
                //  plugins: [
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

        } else {
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
                plugins: [
                    this.cellEditing
                ],
                tbar: tbar,
                viewConfig: {
                    forceFit: true
                }
            });
        }

        this.component.add(this.grid);
        this.component.updateLayout();
    }
});
