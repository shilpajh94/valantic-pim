pimcore.registerNS("pimcore.plugin.distributionhub.toolbar");
pimcore.plugin.distributionhub.toolbar = Class
    .create({
        initialize: function () {
            //
        },
        /*
         * Add menu items in the left navigation panel
         */
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

            /* let distributionHubItems = [];
            distributionHubItems.push({
                text: t("dHub_toolbar"),
                iconCls: "pimcore_icon_routes",
                hideOnClick: true,
                handler: this.createDistributionHubTabPanel
            });
            this.distributionHubMenu = new Ext.menu.Menu({
                items: distributionHubItems,
                shadow: false,
                cls: "pimcore_navigation_flyout"
            });
            let distributionHubMenu = this.distributionHubMenu;
            //show menu on mouse down
           Ext.get("distribution_hub_channel_export").on("mousedown", function (e, el) {
                if (distributionHubMenu.hidden) {
                    e.stopEvent();
                    el = Ext.get(el);
                    var offsets = el.getOffsetsTo(Ext.getBody());
                    offsets[0] = 60;
                    distributionHubMenu.showAt(offsets);
                } else {
                    distributionHubMenu.hide();
                }
            });*/
        },
        /*createDistributionHubTabPanel: function () {
            Ext.getCmp("pimcore_panel_tree_left").collapse();
            if (!Ext.getCmp("distribution_hub")) {
                let dataCon = new pimcore.plugin.distributionhub.mappingPanel();
            } else {
                Ext.getCmp("pimcore_panel_tabs").setActiveItem("distribution_hub");
            }
        }*/
    });
var toolbar = new pimcore.plugin.distributionhub.toolbar();