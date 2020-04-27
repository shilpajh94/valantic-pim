pimcore.registerNS("pimcore.plugin.ADAuthBundle");

pimcore.plugin.ADAuthBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ADAuthBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("ADAuthBundle ready!");
    }
});

var ADAuthBundlePlugin = new pimcore.plugin.ADAuthBundle();
