/** 
 *
 * @class channelstoolbar
 * @desc This file adds menu icon in the left navigation for the plugin
 * @version 1.0
 * 
 */


pimcore.registerNS("pimcore.plugin.channelstoolbar");

pimcore.plugin.channelstoolbar = Class.create({

    /*
     * @constructor
     */
    initialize: function () {
    },

    /*
     * @desc Adds menu icon in the left main menu
     */
    leftNavigation: function () {
        // Commented as this is used with Data connect
       var user = pimcore.globalmanager.get("user");
       if (user.isAllowed("plugin_DistributionHub_mapping") || user.isAllowed("plugin_DistributionHub_channel")) {
           var navigation = Ext.get("pimcore_navigation");
           var ulElement = navigation.selectNode('ul');
           var li = document.createElement("li");

           li.setAttribute("id", "pimcore_menu_disthub");
           li.setAttribute("class", "pimcore_menu_item");
           li.setAttribute("data-menu-tooltip", t("Distribution Hub"));
           ulElement.appendChild(li);

           pimcore.helpers.initMenuTooltips();
           this.addExportMenu(this);
       }
    },

    /*
     * @desc Adds sub menu icon for Mapping and Channel
     */
    addExportMenu: function (scope) {
        var exportItems = [];
        var user = pimcore.globalmanager.get("user");
        if (user.isAllowed("plugin_DistributionHub_mapping")) {
            exportItems.push({
                text: t("Data Export Mapping"),
                iconCls: "plugin_data_mapping_list",
                handler: function () {
                    var mappingToolbar = new pimcore.plugin.mappingtoolbar();
                    mappingToolbar.showDataConnector();
                }
            });
        }

        if (user.isAllowed("plugin_DistributionHub_channel")) {
            exportItems.push({
                text: t("Distribution Channels"),
                iconCls: "plugin_dataconnector",
                handler: function () {
                    scope.showDataConnector();
                }
            });
        }

        this.exportMenu = new Ext.menu.Menu({
            items: exportItems,
            shadow: false,
            cls: "pimcore_navigation_flyout"
        });

        var exportMenus = this.exportMenu;
        Ext.get("pimcore_menu_disthub").on("mousedown", function (e, el) {
            if (exportMenus.hidden) {
                e.stopEvent();
                el = Ext.get(el);
                var offsets = el.getOffsetsTo(Ext.getBody());
                offsets[0] = 60;
                exportMenus.showAt(offsets);
            } else {
                exportMenus.hide();
            }
        });
    },

    /*
     * @desc Open channels screen
     */
    showDataConnector: function () {
        if (!Ext.getCmp("channels_panel")) {
            var dataCon = new pimcore.plugin.channelspanel();
        } else {
            Ext.getCmp("pimcore_panel_tabs").setActiveItem("channels_panel");
        }
    }

});

var channelstoolbar = new pimcore.plugin.channelstoolbar(); 