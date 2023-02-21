pimcore.registerNS("pimcore.plugin.b2btranslation.mappingPanel");
pimcore.plugin.b2btranslation.mappingPanel = Class.create({

    initialize : function(parent) {
        this.getPanel();
    },
   /* PIM and SF Attribute Mapping menu item panel*/
    getPanel : function() {
        const editor = new pimcore.plugin.b2btranslation.mappingLeftPanel();
        if (!this.panel) {
            this.panel = new Ext.Panel({
                id : "b2b_translation_attribute_mapping",
                title : t("b2b_translation_toolbar"),
                iconCls : "pimcore_nav_icon_translations",
                //bodyStyle : "padding: 10px;",
                layout : "fit",
                closable : true,
                items : [ editor.getTabPanel() ]
                // items : []
            });
            const tabPanel = Ext.getCmp("pimcore_panel_tabs");
            tabPanel.add(this.panel);
            tabPanel.setActiveItem("b2b_translation_attribute_mapping");
            this.panel.on("destroy", function() {
                pimcore.globalmanager.remove("b2b_translation_attribute_mapping");
                Ext.getCmp("pimcore_panel_tree_left").expand();
            }.bind(this));
            pimcore.layout.refresh();
        }
        return this.panel;
    }
});
