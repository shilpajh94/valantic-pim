pimcore.registerNS("pimcore.plugin.RestApiBundle");

pimcore.plugin.RestApiBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.RestApiBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("RestApiBundle ready!");
    },
    postOpenObject: function (object, type) {
        console.log(object.data.data);
    }
    
});

var RestApiBundlePlugin = new pimcore.plugin.RestApiBundle();
