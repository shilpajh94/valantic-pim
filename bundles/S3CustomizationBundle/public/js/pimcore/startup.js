pimcore.registerNS("pimcore.plugin.S3CustomizationBundle");

pimcore.plugin.S3CustomizationBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.S3CustomizationBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("S3CustomizationBundle ready!");
    }
});

var S3CustomizationBundlePlugin = new pimcore.plugin.S3CustomizationBundle();
