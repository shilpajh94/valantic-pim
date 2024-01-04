pimcore.registerNS("pimcore.plugin.PTGEUImportBundle");

pimcore.plugin.PTGEUImportBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.PTGEUImportBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("PTGEUImportBundle ready!");
    }
});

var PTGEUImportBundlePlugin = new pimcore.plugin.PTGEUImportBundle();
