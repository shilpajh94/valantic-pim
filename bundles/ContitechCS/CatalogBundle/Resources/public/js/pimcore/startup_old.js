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

        if (objectClassName == 'CSCatalogCategory') {
            let firstLevelCategory = object.edit.dataFields.FirstLevelCategory.component.getValue();

            this.listProductTable(object, firstLevelCategory);

             object.edit.dataFields.FirstLevelCategory.component.on('select', function(eve){
                this.listProductTable(object, eve.value);
             }.bind(this));
        }

        if (objectClassName == 'CSCatalogTables') {

            // Code for populating products
            var productsOptionStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'text'],
                proxy: {
                    type: 'ajax',
                    url: '/contitech_cs_catalog/get-products',
                    method:'POST',
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
        }
    },
    postOpenDocument: function(doc,type){

        let docPath             = doc.data.path;
        let docType             = doc.data.type;
        let template             = doc.data.template;

        if(template ==  'ContitechCSCatalogBundle:Default:template_dynamic_table_of_contents.html.php')
        {
            let resetTableOfContent = new pimcore.plugin.lpe.resetTableOfContent(doc);
            resetTableOfContent.addResetContentButton();
        }
    },
    listProductTable: function (object, category) {

        // Code for populating products
        var SecondLevelCategoryOptionStore = Ext.create('Ext.data.Store', {
            fields: ['id', 'text'],
            proxy: {
                type: 'ajax',
                url: '/contitech_cs_catalog/get-hierarchy',
                method:'POST',
                extraParams: {
                    catId: category,

                },
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },

        });

        SecondLevelCategoryOptionStore.load();

        object.edit.dataFields.SecondLevelCategory.component.setStore(SecondLevelCategoryOptionStore);
        if (object.data.data.SecondLevelCategory !== null)
        {
            object.edit.dataFields.SecondLevelCategory.component.setValue(object.data.data.SecondLevelCategory);
        }
        SecondLevelCategoryOptionStore.load();
    },
});

var ContitechCSCatalogBundlePlugin = new pimcore.plugin.ContitechCSCatalogBundle();
