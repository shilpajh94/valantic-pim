pimcore.registerNS("pimcore.plugin.S3CustomizationBundle");

pimcore.plugin.S3CustomizationBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.S3CustomizationBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("S3CustomizationBundle ready!");
    }
});

var S3CustomizationBundlePlugin = new pimcore.plugin.S3CustomizationBundle();
