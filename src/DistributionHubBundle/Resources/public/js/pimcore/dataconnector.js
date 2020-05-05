/**
 * @class mappingtoolbar
 * @desc This file is used to initialize Mapping panel
 * @version 1.0
 *
 */

pimcore.registerNS("pimcore.plugin.distdataconnection");

pimcore.plugin.distdataconnection = Class.create({
    
    /*
     * @constructor
     */
    initialize: function (parent) {
        this.getPanel();
    },
    
    activate: function () {
        var tabPanel = Ext.getCmp("pimcore_panel_tabs");
    },
    
    /*
     * @desc Opens Mapping panel 
     */
    getPanel: function () {
        var editor = new pimcore.plugin.mappanel();

        if (!this.panel) {
            this.panel = new Ext.Panel({
                id: "distdataconnector",
                title: 'Data Export Mapping',
                iconCls: "plugin_data_mapping_list",
                bodyStyle: "padding: 10px;",
                layout: "fit",
                closable: true,
                items: [editor.getTabPanel()]
            });

            var tabPanel = Ext.getCmp("pimcore_panel_tabs");
            tabPanel.add(this.panel);
            tabPanel.setActiveItem("distdataconnector");

            this.panel.on("destroy", function () {
                pimcore.globalmanager.remove("distdataconnector");
            }.bind(this));

            pimcore.layout.refresh();
        }

        return this.panel;
    }

});
