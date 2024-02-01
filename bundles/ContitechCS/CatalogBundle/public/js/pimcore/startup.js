pimcore.registerNS("pimcore.plugin.ContitechCSCatalogBundle");

pimcore.plugin.ContitechCSCatalogBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.ContitechCSCatalogBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.postOpenObject, this.postOpenObject.bind(this));
        document.addEventListener(pimcore.events.postOpenDocument, this.postOpenDocument.bind(this));
    },

    postOpenObject: function (e) {
       
        let objectClassName = e.detail.object.data.general.className;

        if (objectClassName == 'CSCatalogCategory') {
            let firstLevelCategory = e.detail.object.edit.dataFields.FirstLevelCategory.component.getValue();

            this.csListProductTable(e, firstLevelCategory);

             e.detail.object.edit.dataFields.FirstLevelCategory.component.on('select', function(eve){
                this.csListProductTable(e, eve.value);
             }.bind(this));
        }

        if (objectClassName == 'CSCatalogTables') {

            // Code for populating products
            var productsOptionStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'text'],
                proxy: {
                    type: 'ajax',
                    url: '/contitechcscatalog/get-products',
                    method:'POST',
                    extraParams: {
                        catId: e.detail.object.data.general.parentId,

                    },
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                },

            });

            productsOptionStore.load();

            e.detail.object.edit.dataFields.Products.component.setStore(productsOptionStore);
            if (e.detail.object.data.data.Products !== null)
            {
                e.detail.object.edit.dataFields.Products.component.setValue(e.detail.object.data.data.Products);
            }
            productsOptionStore.load();
        }
    },
    postOpenDocument: function(e){

        let template = e.detail.document.data.template;
        if(template ==  'contitechcscatalog/default/template_dynamic_table_of_contents.html.php')
        {
            let resetTableOfContent = new pimcore.plugin.lpe.resetTableOfContent(doc);
            resetTableOfContent.addResetContentButton();
        }
    },
    csListProductTable: function (e, category) {

        // Code for populating products
        var SecondLevelCategoryOptionStore = Ext.create('Ext.data.Store', {
            fields: ['id', 'text'],
            proxy: {
                type: 'ajax',
                url: '/contitechcscatalog/get-hierarchy',
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

        e.detail.object.edit.dataFields.SecondLevelCategory.component.setStore(SecondLevelCategoryOptionStore);
        if (e.detail.object.data.data.SecondLevelCategory !== null)
        {
            e.detail.object.edit.dataFields.SecondLevelCategory.component.setValue(e.detail.object.data.data.SecondLevelCategory);
        }
        SecondLevelCategoryOptionStore.load();
    },
});

var ContitechCSCatalogBundlePlugin = new pimcore.plugin.ContitechCSCatalogBundle();
