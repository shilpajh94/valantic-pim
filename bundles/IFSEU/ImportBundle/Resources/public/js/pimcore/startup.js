pimcore.registerNS("pimcore.plugin.IFSEUImportBundle");

pimcore.plugin.IFSEUImportBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.IFSEUImportBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("IFSEUImportBundle ready!");
    }
});

var IFSEUImportBundlePlugin = new pimcore.plugin.IFSEUImportBundle();
