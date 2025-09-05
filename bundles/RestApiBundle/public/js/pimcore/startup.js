pimcore.registerNS("pimcore.plugin.RestApiBundle");

pimcore.plugin.RestApiBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.RestApiBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
        document.addEventListener(pimcore.events.postOpenObject, this.postOpenObject.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("RestApiBundle ready!");
    },
    
    postOpenObject: function (e) {
        let type = e.detail.type;
        let objectClassName = e.detail.object.data.general.className;
        if (objectClassName == 'VirtualCatalogApiMapper') {

            Ext.Ajax.request({
                url: "/virtual_catalog/get_mapper_data/",
                method: 'GET',
                async: false,
                params: { 'table': e.detail.object.edit.dataFields.GroupingField.component.getValue(), objId: e.detail.object.id },
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

                    var table = new RestAPI.pimcore.object.tags.table([], e.detail.object.edit.dataFields.originalValues.fieldConfig);
                    var comp = Ext.getCmp(e.detail.object.edit.dataFields.originalValues.component.id);

                    table.initStore(data, comp, e.detail.object.edit.dataFields.originalValues, columns);
                }
            });


            e.detail.object.edit.dataFields.GroupingField.component.on('select', function (event) {
                Ext.Ajax.request({
                    url: "/virtual_catalog/get_mapper_data/",
                    method: 'GET',
                    async: false,
                    params: { 'table': e.detail.object.edit.dataFields.GroupingField.component.getValue(), objId: e.detail.object.id },
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

                        var table = new RestAPI.pimcore.object.tags.table([], e.detail.object.edit.dataFields.originalValues.fieldConfig);
                        var comp = Ext.getCmp(e.detail.object.edit.dataFields.originalValues.component.id);

                        table.initStore(data, comp, e.detail.object.edit.dataFields.originalValues, columns);
                    }
                });
            });

            // let formatterGridHandler = new pimcore.plugin.formattedGridHandlerMapper(object);
            // formatterGridHandler.setUpFormattedGrid();
        }
        if (objectClassName == 'VirtualCatalogApiSorter') {
            var colComp = Ext.getCmp(e.detail.object.edit.dataFields.Columns.component.id);
            colComp.hide();
            var store;
            var columns;
            var data;

            var storeData = [];
            var completeData = [];

            if (e.detail.object.data.data.GroupingField !== null) {

                e.detail.object.edit.dataFields.GroupingField.component.setValue(e.detail.object.data.data.GroupingField);
            }
            if ((e.detail.object.data.data.GroupingField !== null && trim(e.detail.object.data.data.GroupingField) !== "")) {
                var headerSorter = new pimcore.plugin.headerSorter();
                headerSorter.attachHeader(e.detail.object, type, { 'value': e.detail.object.data.data.GroupingField }, null, 0);
            }

            e.detail.object.edit.dataFields.GroupingField.component.on('select', function (event) {
                //console.log(object.data.data.GroupingField);
                //   if(object.data.data.GroupingField != event.value)
                {
                    var headerSorter = new pimcore.plugin.headerSorter();
                    headerSorter.attachHeader(e.detail.object, type, event, null, 1);
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
