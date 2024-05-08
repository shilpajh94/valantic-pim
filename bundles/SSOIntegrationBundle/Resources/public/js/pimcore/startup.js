pimcore.registerNS("pimcore.plugin.ADIntegrationBundle");

pimcore.plugin.SSOIntegrationBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.SSOIntegrationBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("ADIntegrationBundle ready!");
    }
});

var ADIntegrationBundlePlugin = new pimcore.plugin.SSOIntegrationBundle();
