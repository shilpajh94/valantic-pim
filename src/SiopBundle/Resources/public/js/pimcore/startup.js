pimcore.registerNS("pimcore.plugin.SiopBundle");

pimcore.plugin.SiopBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.SiopBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("SiopBundle ready!");
    }
});

var SiopBundlePlugin = new pimcore.plugin.SiopBundle();
