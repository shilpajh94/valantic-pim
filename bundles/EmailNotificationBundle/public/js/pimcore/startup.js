pimcore.registerNS("pimcore.plugin.EmailNotificationBundle");

pimcore.plugin.EmailNotificationBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.EmailNotificationBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.postOpenObject, this.postOpenObject.bind(this));
    },

    pimcoreReady: function (e) {
        alert("EmailNotificationBundle ready!");
    }
});

var EmailNotificationBundlePlugin = new pimcore.plugin.EmailNotificationBundle();
