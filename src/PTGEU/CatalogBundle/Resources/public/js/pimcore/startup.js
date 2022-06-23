pimcore.registerNS("pimcore.plugin.PTGEUCatalogBundle");

pimcore.plugin.PTGEUCatalogBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.PTGEUCatalogBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("PTGEUCatalogBundle ready!");
    },

    postOpenObject: function (object, type) {
       
        let objectClassName = object.data.general.o_className;

        if (objectClassName == 'PTGEUCatalogCategoryAndTable') {
            var colComp = Ext.getCmp(object.edit.dataFields.Columns.component.id);
            colComp.hide();
            
            let fifthLevelCategory = object.edit.dataFields.fifthLevelCategory.component.getValue();

            this.listProductTable(object, fifthLevelCategory);

             object.edit.dataFields.fifthLevelCategory.component.on('select', function(eve){
                this.listProductTable(object, eve.value);
             }.bind(this));

            if((object.data.data.attributeTable !== null && trim(object.data.data.attributeTable) !== "")){
                let headerSelection = new pimcore.plugin.headerSelection();
                headerSelection.attachHeader(object, type,{'value': object.data.data.attributeTable});
            }

            object.edit.dataFields.attributeTable.component.on('select', function(event){
                {
                    let headerSelection = new pimcore.plugin.headerSelection();
                    headerSelection.attachHeader(object, type,event);
                }
            });
        }
    },

    listProductTable: function (object, category) {

        // Code for populating products
        var sixSevenLevelCategoryOptionStore = Ext.create('Ext.data.Store', {
            fields: ['id', 'text'],
            proxy: {
                type: 'ajax',
                url: '/ptgeu_catalog/get-available-six-level-categories',
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

        sixSevenLevelCategoryOptionStore.load();

        object.edit.dataFields.sixSevenLevelCategory.component.setStore(sixSevenLevelCategoryOptionStore);
        if (object.data.data.sixSevenLevelCategory !== null)
        {
            object.edit.dataFields.sixSevenLevelCategory.component.setValue(object.data.data.sixSevenLevelCategory);
        }
        sixSevenLevelCategoryOptionStore.load();
    },
});

var PTGEUCatalogBundlePlugin = new pimcore.plugin.PTGEUCatalogBundle();
