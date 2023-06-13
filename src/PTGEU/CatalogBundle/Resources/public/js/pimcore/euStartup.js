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

        if (object.data.general.o_className == 'PTGEUCatalog') {
            // var SalesOrganisationCompObj = object.edit.dataFields.SalesOrganisation.component;
            var DistributionChannelCompObj = object.edit.dataFields.DistributionChannel.component;
            var IsPriceCatalogCompObj = object.edit.dataFields.IsPriceCatalog.component;
            var CurrencyCompObj = object.edit.dataFields.Currency.component;
            var ValidFromDateCompObj = object.edit.dataFields.ValidFromDate.component;
            if(IsPriceCatalogCompObj.value == '1')
            {
                // SalesOrganisationCompObj.show();
                // SalesOrganisationCompObj.enable();
                DistributionChannelCompObj.show();
                DistributionChannelCompObj.enable();
                CurrencyCompObj.show();
                CurrencyCompObj.enable();
                ValidFromDateCompObj.show();
                ValidFromDateCompObj.enable();
            }
            else{
                // SalesOrganisationCompObj.hide();
                // SalesOrganisationCompObj.disable();
                DistributionChannelCompObj.hide();
                DistributionChannelCompObj.disable();
                CurrencyCompObj.hide();
                CurrencyCompObj.disable();
                ValidFromDateCompObj.hide();
                ValidFromDateCompObj.disable();
            }

            IsPriceCatalogCompObj.addListener('change', function (prVal, chVal) {
                
                if(chVal == '1')
                {
                    // SalesOrganisationCompObj.show();
                    // SalesOrganisationCompObj.enable();
                    DistributionChannelCompObj.show();
                    DistributionChannelCompObj.enable();
                    CurrencyCompObj.show();
                    CurrencyCompObj.enable();
                    ValidFromDateCompObj.show();
                    ValidFromDateCompObj.enable();
                }
                else{
                    // SalesOrganisationCompObj.hide();
                    // SalesOrganisationCompObj.disable();
                    DistributionChannelCompObj.hide();
                    DistributionChannelCompObj.disable();
                    CurrencyCompObj.hide();
                    CurrencyCompObj.disable();
                    ValidFromDateCompObj.hide();
                    ValidFromDateCompObj.disable();
                }

            });
        }

        if (objectClassName == 'PTGEUCatalogCategory') {
            var colComp = Ext.getCmp(object.edit.dataFields.Columns.component.id);
            colComp.hide();

            var colSortingColumns = Ext.getCmp(object.edit.dataFields.SortingColumns.component.id);
            colSortingColumns.hide();
            
            let fifthLevelCategory = object.edit.dataFields.fifthLevelCategory.component.getValue();
            this.listProductTable(object, fifthLevelCategory);

             object.edit.dataFields.fifthLevelCategory.component.on('select', function(eve){
                this.listProductTable(object, eve.value);
             }.bind(this));

            let euHeaderSelection = new pimcore.plugin.euHeaderSelection();
            euHeaderSelection.attachEUHeaders(object);
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
