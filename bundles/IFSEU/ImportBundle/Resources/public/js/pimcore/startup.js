pimcore.registerNS("pimcore.plugin.IFSEUImportBundle");

pimcore.plugin.IFSEUImportBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.IFSEUImportBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params, broker) {
    //     // alert("IFSEUImportBundle ready!");
    // }
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.IFSEUImportBundle::pimcoreReady'));
    }
});

//var IFSEUImportBundlePlugin = new pimcore.plugin.IFSEUImportBundle();
document.addEventListener('pimcore.plugin.IFSEUImportBundle::pimcoreReady', function (event) {
    // For instance: alert("IFSEUImportBundle ready!");
});
