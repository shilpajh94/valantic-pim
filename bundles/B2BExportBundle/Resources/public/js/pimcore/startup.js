pimcore.registerNS("pimcore.plugin.B2BExportBundle");

pimcore.plugin.B2BExportBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.B2BExportBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("B2BExportBundle ready!");
    }
});

var B2BExportBundlePlugin = new pimcore.plugin.B2BExportBundle();
