pimcore.registerNS("pimcore.plugin.AppBundle");

pimcore.plugin.AppBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.AppBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("AppBundle ready!");
    }
});

var AppBundlePlugin = new pimcore.plugin.AppBundle();
