pimcore.registerNS("pimcore.plugin.DistributionHubBundle");

pimcore.plugin.DistributionHubBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.DistributionHubBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        let user = pimcore.globalmanager.get("user");
        if (user.admin || user.isAllowed("plugin_distribution_hub")) {
            let toolbar = new pimcore.plugin.distributionhub.toolbar();
            toolbar.leftNavigation();
        }
    }
});

var DistributionHubBundlePlugin = new pimcore.plugin.DistributionHubBundle();
