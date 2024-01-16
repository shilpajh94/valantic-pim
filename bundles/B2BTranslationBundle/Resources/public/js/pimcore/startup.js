document.addEventListener(pimcore.events.pimcoreReady, (e) => {

    let user = pimcore.globalmanager.get("user");
    if (user.admin) {
        // this.leftNavigation();
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

    //print out the parameters of the event
    console.log('pimcore.plugin.B2BTranslationBundle pimcoreReady')
    e.preventDefault();
    e.stopPropagation();
});