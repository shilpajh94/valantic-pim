pimcore.registerNS("pimcore.plugin.ContitechCSImportBundle");

pimcore.plugin.ContitechCSImportBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ContitechCSImportBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("ContitechCSImportBundle ready!");
    }
});

var ContitechCSImportBundlePlugin = new pimcore.plugin.ContitechCSImportBundle();
