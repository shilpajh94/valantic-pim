pimcore.registerNS("pimcore.plugin.PTGEUProductBundle");

pimcore.plugin.PTGEUProductBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.PTGEUProductBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("PTGEUProductBundle ready!");
    }
});

var PTGEUProductBundlePlugin = new pimcore.plugin.PTGEUProductBundle();
