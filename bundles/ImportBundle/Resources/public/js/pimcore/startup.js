pimcore.registerNS("pimcore.plugin.ImportBundle");

pimcore.plugin.ImportBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ImportBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params, broker) {
    //     // alert("ImportBundle ready!");
    // }
    //Changes done by Piyush Start
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.ImportBundle::pimcoreReady'));
    }
});
// var ImportBundlePlugin = new pimcore.plugin.ImportBundle();
document.addEventListener('pimcore.plugin.ImportBundle::pimcoreReady', function (event) {
    // For instance: alert("ImportBundle ready!");
});
//Changes done by Piyush End
