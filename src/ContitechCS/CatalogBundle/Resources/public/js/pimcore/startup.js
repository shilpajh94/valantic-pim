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
    }
});

var ContitechCSCatalogBundlePlugin = new pimcore.plugin.ContitechCSCatalogBundle();
