pimcore.registerNS("pimcore.plugin.B2BTranslationBundle");

pimcore.plugin.B2BTranslationBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.B2BTranslationBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        let user = pimcore.globalmanager.get("user");
        if (user.admin) {
            this.b2bTranslationLeftNavigation();
        }
    },
   
    b2bTranslationLeftNavigation: function () {
        let navigation = Ext.get("pimcore_navigation");
        let ulElement = navigation.selectNode('ul');
        let li = document.createElement("li");
        li.setAttribute("id", "b2b_translation_mapping");
        li.setAttribute("class", "b2b_translation_mapping");
        li.setAttribute("data-menu-tooltip", t("b2b_translation_toolbar"));
        ulElement.appendChild(li);
        let svg = document.createElement("svg");
        svg.setAttribute("class", "pimcore_nav_icon_translations");
        li.appendChild(svg);
        ulElement.appendChild(li);
        pimcore.helpers.initMenuTooltips();
        Ext.get("b2b_translation_mapping").on("mousedown", function (e, el) {
            e.stopEvent();
            Ext.getCmp("pimcore_panel_tree_left").collapse();
            if (!Ext.getCmp("b2b_translation_attribute_mapping")) {
                let dataCon = new pimcore.plugin.b2btranslation.mappingPanel();
            } else {
                Ext.getCmp("pimcore_panel_tabs").setActiveItem("b2b_translation_attribute_mapping");
            }
        });
    }
});

var B2BTranslationBundlePlugin = new pimcore.plugin.B2BTranslationBundle();