pimcore.registerNS("pimcore.plugin.ContitechCSImportBundle");

pimcore.plugin.ContitechCSImportBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ContitechCSImportBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params, broker) {
    //     // alert("ContitechCSImportBundle ready!");
    // }
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.ContitechCSImportBundle::pimcoreReady'));
    }
});

//var ContitechCSImportBundlePlugin = new pimcore.plugin.ContitechCSImportBundle();
document.addEventListener('pimcore.plugin.ContitechCSImportBundle::pimcoreReady', function (event) {
    // For instance: alert("ImportBundle ready!");
});
