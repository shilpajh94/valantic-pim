pimcore.registerNS("pimcore.plugin.EmailNotificationBundle");

pimcore.plugin.EmailNotificationBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.EmailNotificationBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params, broker) {
    //     // alert("EmailNotificationBundle ready!");
    // }
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.EmailNotificationBundle::pimcoreReady'));
    }
});

// var EmailNotificationBundlePlugin = new pimcore.plugin.EmailNotificationBundle();
document.addEventListener('pimcore.plugin.EmailNotificationBundle::pimcoreReady', function (event) {
    // For instance: alert("EmailNotificationBundle ready!");
});
