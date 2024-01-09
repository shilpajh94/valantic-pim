pimcore.registerNS("pimcore.plugin.RestApiBundle");

pimcore.plugin.RestApiBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.RestApiBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    // pimcoreReady: function (params, broker) {
    //     // alert("RestApiBundle ready!");
    // }
    pimcoreReady: function (params, broker) {
        document.dispatchEvent(new Event('pimcore.plugin.RestApiBundle::pimcoreReady'));
    }
});

//var RestApiBundlePlugin = new pimcore.plugin.RestApiBundle();
document.addEventListener('pimcore.plugin.RestApiBundle::pimcoreReady', function (event) {
    // For instance: alert("RestApiBundle ready!");
});