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
                    params: {'table': object.edit.dataFields.GroupingField.component.getValue(), objId: object.id},
                    success: function (response) {
                        response = Ext.decode(response.responseText);

                        store = Ext.create('Ext.data.Store', {
                            fields: response.fieldData,
                            data: {'items': response.data},
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



                        var table = new Conti.pimcore.object.tags.table([], object.edit.dataFields.originalValues.fieldConfig);
                        var comp = Ext.getCmp(object.edit.dataFields.originalValues.component.id);

                        table.initStore(data, comp, object.edit.dataFields.originalValues, columns);


                        // var table = new Conti.pimcore.object.tags.table([], object.edit.dataFields.valueAlias.fieldConfig);
                        // var comp = Ext.getCmp(object.edit.dataFields.valueAlias.component.id);

                        // table.initStore(response.newdata, comp, object.edit.dataFields.valueAlias, response.newcolumnData);


                    }
                });


                object.edit.dataFields.GroupingField.component.on('select', function(event){
                    Ext.Ajax.request({
                        url: "/virtual_catalog/get_mapper_data/",
                        method: 'GET',
                        async: false,
                        params: {'table': object.edit.dataFields.GroupingField.component.getValue(), objId: object.id},
                        success: function (response) {
                            response = Ext.decode(response.responseText);
    
                            store = Ext.create('Ext.data.Store', {
                                fields: response.fieldData,
                                data: {'items': response.data},
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
    
                            var table = new Conti.pimcore.object.tags.table([], object.edit.dataFields.originalValues.fieldConfig);
                            var comp = Ext.getCmp(object.edit.dataFields.originalValues.component.id);
    
                            table.initStore(data, comp, object.edit.dataFields.originalValues, columns);

                        //     var table = new Conti.pimcore.object.tags.table([], object.edit.dataFields.valueAlias.fieldConfig);
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

            if (object.data.data.GroupingField !== null)
            {
                
                object.edit.dataFields.GroupingField.component.setValue(object.data.data.GroupingField);
            }
            if((object.data.data.GroupingField !== null && trim(object.data.data.GroupingField) !== "")){
                var headerSorter = new pimcore.plugin.headerSorter();
                headerSorter.attachHeader(object, type,{'value': object.data.data.GroupingField},null,0);
            }

            object.edit.dataFields.GroupingField.component.on('select', function(event){
             //console.log(object.data.data.GroupingField);
          //   if(object.data.data.GroupingField != event.value)
                {
                    var headerSorter = new pimcore.plugin.headerSorter();
                    headerSorter.attachHeader(object, type,event,null,1);
                }
            });



        }
    }
});



var RestApiBundlePlugin = new pimcore.plugin.RestApiBundle();
