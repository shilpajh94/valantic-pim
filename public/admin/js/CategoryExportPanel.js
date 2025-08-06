document.addEventListener(pimcore.events.postOpenObject, (e) => {
    if (e.detail.object.data.general.className === 'UniProductCategoryExternal') {
        e.detail.object.toolbar.add({
            text: t('Export as XLSX'),
            iconCls: 'pimcore_icon_download',
            handler: function (obj) {
                const exportUrl = Routing.generate('admin_export_preview', {
                    id: obj.data.general.id,
                    format: 'xlsx'
                });
                window.open(exportUrl, '_blank');
            }.bind(this, e.detail.object)
        });
        e.detail.object.toolbar.add({
            text: t('Export as CSV'),
            iconCls: 'pimcore_icon_csv',
            handler: function (obj) {
                const exportUrl = Routing.generate('admin_export_preview', {
                    id: obj.data.general.id,
                    format: 'csv'
                });
                window.open(exportUrl, '_blank');
            }.bind(this, e.detail.object)
        });

        pimcore.layout.refresh();
    }
});
