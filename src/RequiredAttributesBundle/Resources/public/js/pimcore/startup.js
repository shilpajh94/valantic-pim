pimcore.registerNS("pimcore.plugin.RequiredAttributesBundle");

pimcore.plugin.RequiredAttributesBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.RequiredAttributesBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("RequiredAttributesBundle ready!");
    }
});

var RequiredAttributesBundlePlugin = new pimcore.plugin.RequiredAttributesBundle();
