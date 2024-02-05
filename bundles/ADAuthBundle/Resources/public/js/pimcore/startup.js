pimcore.registerNS("pimcore.plugin.ADAuthBundle");

pimcore.plugin.ADAuthBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.ADAuthBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("ADAuthBundle ready!");
    }
});

var ADAuthBundlePlugin = new pimcore.plugin.ADAuthBundle();
