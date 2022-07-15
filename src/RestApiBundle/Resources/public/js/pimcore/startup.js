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
