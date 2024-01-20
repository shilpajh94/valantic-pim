pimcore.registerNS("pimcore.plugin.PimDataPostBundle");

pimcore.plugin.PimDataPostBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.PimDataPostBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("PimDataPostBundle ready!");
    }
});

var PimDataPostBundlePlugin = new pimcore.plugin.PimDataPostBundle();
