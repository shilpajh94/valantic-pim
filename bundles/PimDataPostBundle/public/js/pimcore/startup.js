pimcore.registerNS("pimcore.plugin.PimDataPostBundle");

pimcore.plugin.PimDataPostBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.PimDataPostBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("PimDataPostBundle ready!");
    }
});

var PimDataPostBundlePlugin = new pimcore.plugin.PimDataPostBundle();
