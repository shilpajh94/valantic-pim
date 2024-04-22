pimcore.registerNS("pimcore.plugin.B2BSalesforcePTGEMEABundle");

pimcore.plugin.B2BSalesforcePTGEMEABundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.B2BSalesforcePTGEMEABundle";
    },

    initialize: function () {
        // pimcore.plugin.broker.registerPlugin(this);
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));

    },

    // pimcoreReady: function (params, broker) {
    //     // alert("B2BSalesforcePTGEMEABundle ready!");
    //     let user = pimcore.globalmanager.get("user");
    //     if (user.admin) {
    //         this.leftNavigation();
    //     }
    // },

    pimcoreReady: function (e) {
        // alert("B2BSalesforcePTGEMEABundle ready!");
        let user = pimcore.globalmanager.get("user");
        if (user.admin) {
            this.leftNavigation();
        }
    },

});






