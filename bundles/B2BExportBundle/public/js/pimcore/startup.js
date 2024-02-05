pimcore.registerNS("pimcore.plugin.B2BExportBundle");

pimcore.plugin.B2BExportBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.B2BExportBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("B2BExportBundle ready!");
    }
});

var B2BExportBundlePlugin = new pimcore.plugin.B2BExportBundle();
