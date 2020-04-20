/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

pimcore.registerNS("pimcore.plugin.channelspanel");

pimcore.plugin.channelspanel = Class.create({
    
    initialize: function (parent) {
        this.getPanel();
    },
    
    activate: function () {
        var tabPanel = Ext.getCmp("pimcore_panel_tabs");
    },
    
    // Opens Channels panel 
    getPanel: function () {
        var editor = new pimcore.plugin.channels.panel();

        if (!this.panel) {
            this.panel = new Ext.Panel({
                id: "channels_panel",
                title: 'Channels',
                iconCls: "plugin_dataconnector",
                bodyStyle: "padding: 10px;",
                layout: "fit",
                closable: true,
                items: [editor.getTabPanel()]
            });

            var tabPanel = Ext.getCmp("pimcore_panel_tabs");
            tabPanel.add(this.panel);
            tabPanel.setActiveItem("channels_panel");

            this.panel.on("destroy", function () {
                pimcore.globalmanager.remove("channels_panel");
            }.bind(this));

            pimcore.layout.refresh();
        }

        return this.panel;
    }

});

