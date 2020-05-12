pimcore.registerNS("pimcore.plugin.CatalogBundle");

pimcore.plugin.CatalogBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.CatalogBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("CatalogBundle ready!");
    },
    postOpenObject: function (object, type) {
        let objectClassName = object.data.general.o_className;

        //let helper = new pimcore.plugin.lpeHelper();
        if(objectClassName == 'CatalogTables'){
            var headerSelection = new pimcore.plugin.headerSelection();
            headerSelection.attachHeader(object, type);
        }
    }
});

var CatalogBundlePlugin = new pimcore.plugin.CatalogBundle();
