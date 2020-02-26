pimcore.registerNS("pimcore.plugin.SapBwBundle");

pimcore.plugin.SapBwBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.SapBwBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("SapBwBundle ready!");
    }
});

var SapBwBundlePlugin = new pimcore.plugin.SapBwBundle();
