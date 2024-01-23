document.addEventListener(pimcore.events.postOpenObject, (e) => {
    //print out the parameters of the event
    console.log('pimcore.plugin.ContitechCSCatalogBundle postOpenObject')

    let objectClassName = e.detail.object.data.general.o_className;

    if (objectClassName == 'CSCatalogCategory') {
        let firstLevelCategory = e.detail.object.edit.dataFields.FirstLevelCategory.component.getValue();

        this.listProductTable(e, firstLevelCategory);

        e.detail.object.edit.dataFields.FirstLevelCategory.component.on('select', function (eve) {
            this.listProductTable(e, eve.value);
        }.bind(this));
    }

    if (objectClassName == 'CSCatalogTables') {

        // Code for populating products
        var productsOptionStore = Ext.create('Ext.data.Store', {
            fields: ['id', 'text'],
            proxy: {
                type: 'ajax',
                url: '/contitech_cs_catalog/get-products',
                method: 'POST',
                extraParams: {
                    catId: e.detail.object.data.general.o_parentId,

                },
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },

        });

        productsOptionStore.load();

        e.detail.object.edit.dataFields.Products.component.setStore(productsOptionStore);
        if (e.detail.object.data.data.Products !== null) {
            e.detail.object.edit.dataFields.Products.component.setValue(e.detail.object.data.data.Products);
        }
        productsOptionStore.load();
    }

    e.preventDefault();
    e.stopPropagation();
});

document.addEventListener(pimcore.events.postOpenDocument, (e) => {

    console.log('pimcore.plugin.ContitechCSCatalogBundle postOpenDocument')

    let template = e.detail.document.data.template;

    if (template == '@ContitechCSCatalog\Default\template_dynamic_table_of_contents.html.twig') {
        let resetTableOfContent = new pimcore.plugin.lpe.resetTableOfContent(e.detail.document);
        resetTableOfContent.addResetContentButton();
    }

    e.preventDefault();
    e.stopPropagation();
});

function listProductTable(e, category) {

    // Code for populating products
    var SecondLevelCategoryOptionStore = Ext.create('Ext.data.Store', {
        fields: ['id', 'text'],
        proxy: {
            type: 'ajax',
            url: '/contitech_cs_catalog/get-hierarchy',
            method: 'POST',
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
    if (e.detail.object.data.data.SecondLevelCategory !== null) {
        e.detail.object.edit.dataFields.SecondLevelCategory.component.setValue(e.detail.object.data.data.SecondLevelCategory);
    }
    SecondLevelCategoryOptionStore.load();
}