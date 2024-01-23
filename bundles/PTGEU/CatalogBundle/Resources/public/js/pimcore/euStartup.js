document.addEventListener(pimcore.events.postOpenObject, (e) => {
    console.log('pimcore.plugin.PTGEUCatalogBundle postOpenObject')
    let objectClassName = e.detail.object.data.general.o_className;

    if (objectClassName == 'PTGEUCatalog') {
        var DistributionChannelCompObj = e.detail.object.edit.dataFields.DistributionChannel.component;
        var IsPriceCatalogCompObj = e.detail.object.edit.dataFields.IsPriceCatalog.component;
        var CurrencyCompObj = e.detail.object.edit.dataFields.Currency.component;
        var ValidFromDateCompObj = e.detail.object.edit.dataFields.ValidFromDate.component;
        if (IsPriceCatalogCompObj.value == '1') {
            DistributionChannelCompObj.show();
            DistributionChannelCompObj.enable();
            CurrencyCompObj.show();
            CurrencyCompObj.enable();
            ValidFromDateCompObj.show();
            ValidFromDateCompObj.enable();
        }
        else {
            DistributionChannelCompObj.hide();
            DistributionChannelCompObj.disable();
            CurrencyCompObj.hide();
            CurrencyCompObj.disable();
            ValidFromDateCompObj.hide();
            ValidFromDateCompObj.disable();
        }

        IsPriceCatalogCompObj.addListener('change', function (prVal, chVal) {

            if (chVal == '1') {
                DistributionChannelCompObj.show();
                DistributionChannelCompObj.enable();
                CurrencyCompObj.show();
                CurrencyCompObj.enable();
                ValidFromDateCompObj.show();
                ValidFromDateCompObj.enable();
            }
            else {
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
        var colComp = Ext.getCmp(e.detail.object.edit.dataFields.Columns.component.id);
        colComp.hide();

        var colSortingColumns = Ext.getCmp(e.detail.object.edit.dataFields.SortingColumns.component.id);
        colSortingColumns.hide();

        let fifthLevelCategory = e.detail.object.edit.dataFields.fifthLevelCategory.component.getValue();
        this.ptgEulistProductTable(e, fifthLevelCategory);

        e.detail.object.edit.dataFields.fifthLevelCategory.component.on('select', function (eve) {
            this.ptgEulistProductTable(e, eve.value);
        }.bind(this));

        let euHeaderSelection = new pimcore.plugin.euHeaderSelection();
        euHeaderSelection.attachEUHeaders(e.detail.object);
    }
});

function ptgEulistProductTable(e, category) {

    // Code for populating products
    var sixSevenLevelCategoryOptionStore = Ext.create('Ext.data.Store', {
        fields: ['id', 'text'],
        proxy: {
            type: 'ajax',
            url: '/ptgeu_catalog/get-available-six-level-categories',
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

    sixSevenLevelCategoryOptionStore.load();

    e.detail.object.edit.dataFields.sixSevenLevelCategory.component.setStore(sixSevenLevelCategoryOptionStore);
    if (e.detail.object.data.data.sixSevenLevelCategory !== null) {
        e.detail.object.edit.dataFields.sixSevenLevelCategory.component.setValue(e.detail.object.data.data.sixSevenLevelCategory);
    }
    sixSevenLevelCategoryOptionStore.load();
}