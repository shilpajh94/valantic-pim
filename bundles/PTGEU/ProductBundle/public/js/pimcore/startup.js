pimcore.registerNS("pimcore.plugin.PTGEUProductBundle");

pimcore.plugin.PTGEUProductBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.PTGEUProductBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (params, broker) {
        // alert("PTGEUProductBundle ready!");
    }
    
});

var PTGEUProductBundlePlugin = new pimcore.plugin.PTGEUProductBundle();
