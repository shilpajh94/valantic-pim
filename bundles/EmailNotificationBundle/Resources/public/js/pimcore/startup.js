pimcore.registerNS("pimcore.plugin.EmailNotificationBundle");

pimcore.plugin.EmailNotificationBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.EmailNotificationBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("EmailNotificationBundle ready!");
    }
});

var EmailNotificationBundlePlugin = new pimcore.plugin.EmailNotificationBundle();
