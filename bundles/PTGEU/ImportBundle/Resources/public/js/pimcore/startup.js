pimcore.registerNS("pimcore.plugin.PTGEUImportBundle");

pimcore.plugin.PTGEUImportBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.PTGEUImportBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params, broker) {
    //     // alert("PTGEUImportBundle ready!");
    // }
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.PTGEUImportBundle::pimcoreReady'));
    }
});

//var PTGEUImportBundlePlugin = new pimcore.plugin.PTGEUImportBundle();
document.addEventListener('pimcore.plugin.PTGEUImportBundle::pimcoreReady', function (event) {
    // For instance: alert("PTGEUImportBundle ready!");
});

