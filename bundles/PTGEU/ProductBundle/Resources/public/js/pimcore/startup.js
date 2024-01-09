pimcore.registerNS("pimcore.plugin.PTGEUProductBundle");

pimcore.plugin.PTGEUProductBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.PTGEUProductBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params, broker) {
    //     // alert("PTGEUProductBundle ready!");
    // }
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.PTGEUProductBundle::pimcoreReady'));
    }
});

//var PTGEUProductBundlePlugin = new pimcore.plugin.PTGEUProductBundle();
document.addEventListener('pimcore.plugin.PTGEUProductBundle::pimcoreReady', function (event) {
    // For instance: alert("PTGEUProductBundle ready!");
});
