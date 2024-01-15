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
            this.leftNavigation();
        }
        new pimcore.plugin.DistributionHubBundle.PhpCodeOperator().phpCodeOperatorPath_Label_Modification();
    },
    leftNavigation: function () {
        let navigation = Ext.get("pimcore_navigation");
        let ulElement = navigation.selectNode('ul');
        let li = document.createElement("li");
        li.setAttribute("id", "distribution_hub_channel_export");
        li.setAttribute("class", "distribution_hub_channel_export");
        li.setAttribute("data-menu-tooltip", t("dHub_toolbar"));
        ulElement.appendChild(li);
        let svg = document.createElement("svg");
        svg.setAttribute("class", "pimcore_nav_icon_routes");
        li.appendChild(svg);
        ulElement.appendChild(li);
        pimcore.helpers.initMenuTooltips();
        Ext.get("distribution_hub_channel_export").on("mousedown", function (e, el) {
            e.stopEvent();
            Ext.getCmp("pimcore_panel_tree_left").collapse();
            if (!Ext.getCmp("distribution_hub")) {
                let dataCon = new pimcore.plugin.distributionhub.mappingPanel();
            } else {
                Ext.getCmp("pimcore_panel_tabs").setActiveItem("distribution_hub");
            }
        });
    }
});

var DistributionHubBundlePlugin = new pimcore.plugin.DistributionHubBundle();
