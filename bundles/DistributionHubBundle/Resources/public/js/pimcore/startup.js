document.addEventListener(pimcore.events.pimcoreReady, (e) => {

    let user = pimcore.globalmanager.get("user");
    if (user.admin || user.isAllowed("plugin_distribution_hub")) {
        let navigation = Ext.get("pimcore_navigation");
        let ulElement = navigation.selectNode('ul');
        let li = document.createElement("li");
        li.setAttribute("id", "distribution_hub_channel_export");
        li.setAttribute("class", "distribution_hub_channel_export");
        li.setAttribute("data-menu-tooltip", t("dHub_toolbar"));
        ulElement.appendChild(li);
        let svg = document.createElement("svg");
        svg.setAttribute("class", "pimcore_icon_gridconfig_class_attributes");
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
    new pimcore.plugin.DistributionHubBundle.PhpCodeOperator().phpCodeOperatorPath_Label_Modification();

    //print out the parameters of the event
    console.log('pimcore.plugin.DistributionHubBundle pimcoreReady')
    e.preventDefault();
    e.stopPropagation();
});
