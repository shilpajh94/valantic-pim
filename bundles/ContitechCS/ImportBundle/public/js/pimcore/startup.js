pimcore.registerNS("pimcore.plugin.ContitechCSImportBundle");

pimcore.plugin.ContitechCSImportBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.ContitechCSImportBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("ContitechCSImportBundle ready!");
    }
});

var ContitechCSImportBundlePlugin = new pimcore.plugin.ContitechCSImportBundle();
