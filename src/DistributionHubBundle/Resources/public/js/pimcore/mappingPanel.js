pimcore.registerNS("pimcore.plugin.distributionhub.mappingPanel");
pimcore.plugin.distributionhub.mappingPanel = Class.create({

    initialize : function(parent) {
        this.getPanel();
    },
   /* Distribution Hub menu item panel*/
    getPanel : function() {
        const editor = new pimcore.plugin.distributionhub.mappingLeftPanel();
        if (!this.panel) {
            this.panel = new Ext.Panel({
                id : "distribution_hub",
                title : t("dHub_toolbar"),
                iconCls : "pimcore_icon_routes",
                //bodyStyle : "padding: 10px;",
                layout : "fit",
                closable : true,
                items : [ editor.getTabPanel() ]
            });
            const tabPanel = Ext.getCmp("pimcore_panel_tabs");
            tabPanel.add(this.panel);
            tabPanel.setActiveItem("distribution_hub");
            this.panel.on("destroy", function() {
                pimcore.globalmanager.remove("distribution_hub");
                Ext.getCmp("pimcore_panel_tree_left").expand();
            }.bind(this));
            pimcore.layout.refresh();
        }
        return this.panel;
    }
});
