pimcore.registerNS("pimcore.plugin.PTGEUImportBundle");

pimcore.plugin.PTGEUImportBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.PTGEUImportBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (params, broker) {
        // alert("PTGEUImportBundle ready!");
    }
    
});

var PTGEUImportBundlePlugin = new pimcore.plugin.PTGEUImportBundle();

