pimcore.registerNS("pimcore.plugin.IFSEUImportBundle");

pimcore.plugin.IFSEUImportBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.IFSEUImportBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("IFSEUImportBundle ready!");
    }
});

var IFSEUImportBundlePlugin = new pimcore.plugin.IFSEUImportBundle();
