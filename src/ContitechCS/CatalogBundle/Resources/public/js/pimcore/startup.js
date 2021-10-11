pimcore.registerNS("pimcore.plugin.ContitechCSCatalogBundle");

pimcore.plugin.ContitechCSCatalogBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ContitechCSCatalogBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("ContitechCSCatalogBundle ready!");
    },
    postOpenObject: function (object, type) {
       
        let objectClassName = object.data.general.o_className;

        if (objectClassName == 'CSCatalogTables') {

            // Code for populating products
            var productsOptionStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'text'],
                proxy: {
                    type: 'ajax',
                    url: '/contitech_cs_catalog/get-products',
                    //  method:'POST',
                    extraParams: {
                        catId: object.data.general.o_parentId,

                    },
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                },

            });

            productsOptionStore.load();

            object.edit.dataFields.Products.component.setStore(productsOptionStore);
            if (object.data.data.Products !== null)
            {
                object.edit.dataFields.Products.component.setValue(object.data.data.Products);
            }
            productsOptionStore.load();

            // // Code for populating product's tables on select
            // object.edit.dataFields.Products.component.on('select', function (e) {
            //     this.listProductTable(object, e.rawValue);
            // }.bind(this));

            // // Code for populating product's tables on load 
            //  object.edit.dataFields.Products.component.on('change', function(eve){
            //     this.listProductTable(object, eve.rawValue);
            //  }.bind(this));
        }
    },

    // listProductTable: function (object, product) {

    //     var productTablesOptionsStore = Ext.create('Ext.data.Store', {
    //         fields: ['id', 'text'],
    //         proxy: {
    //             type: 'ajax',
    //             url: '/contitech_cs_catalog/get-products-tables',
    //             //  method:'POST',
    //             extraParams: {
    //                 product: product,

    //             },
    //             reader: {
    //                 type: 'json',
    //                 rootProperty: 'data'
    //             }
    //         },
    //     });

    //     console.log(productTablesOptionsStore);
    //     productTablesOptionsStore.load();

    //     object.edit.dataFields.ProductTables.component.setStore(productTablesOptionsStore);
    //         console.log(object.data.data);    
    //     if (object.data.data.ProductTables !== null)
    //     {
    //         object.edit.dataFields.ProductTables.component.setValue(object.data.data.ProductTables);
    //     }
    //     productTablesOptionsStore.load();
    // },
});

var ContitechCSCatalogBundlePlugin = new pimcore.plugin.ContitechCSCatalogBundle();
