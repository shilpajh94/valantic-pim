pimcore.registerNS("pimcore.plugin.IFSEUProductBundle");

pimcore.plugin.IFSEUProductBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.IFSEUProductBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("IFSEUProductBundle ready!");
    }
});

var IFSEUProductBundlePlugin = new pimcore.plugin.IFSEUProductBundle();
