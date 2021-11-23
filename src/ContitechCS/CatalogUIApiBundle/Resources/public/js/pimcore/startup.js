pimcore.registerNS("pimcore.plugin.CatalogUIApiBundle");

pimcore.plugin.CatalogUIApiBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.CatalogUIApiBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("CatalogUIApiBundle ready!");
    }
});

var CatalogUIApiBundlePlugin = new pimcore.plugin.CatalogUIApiBundle();
