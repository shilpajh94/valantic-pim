pimcore.registerNS("pimcore.plugin.distributionhub.configItem");
pimcore.plugin.distributionhub.configItem = Class.create(pimcore.element.abstract, {
    initialize: function (data, pimId, parent, parentType) {
        this.parent = parent;
        this.parentType = parentType;
        this.pimId = pimId;
        this.data = data;
        this.mappingAttributeSetting = {};
        this.modificationDate = data.modificationDate;
        this.getFiltersConfig = new pimcore.plugin.distributionhub.tabs.filtersConfig(this.data, this.parentType);
        this.tab = new Ext.TabPanel({
            activeTab: 0,
            title: Ext.util.Format.htmlEncode(this.data.general.o_key),
            closable: true,
            deferredRender: false,
            forceLayout: true,
            // iconCls: "pimcore_icon_routes",
            id: "distributionhub_mapping_panel_" + this.data.general.o_id,
            buttons: {
                itemId: 'footer'
            },
            items:
                    [
                        this.getBasicConfiguration(),
                        // this.getColumnConfiguration(),
                        // this.getFilters(this.getFiltersConfig),
                        // this.getPreview(this.getFiltersConfig),
                        // this.getScheduleConfiguration(),
                        // this.getShare()
                    ]
        });
        if (typeof parentType != "undefined" && parentType == 'shared') {
            this.tab.remove(this.getShare());
        }
        this.tab.on("activate", this.tabactivated.bind(this));
        this.tab.on("destroy", this.tabdestroy.bind(this));

        this.parent.editPanel.add(this.tab);
        this.parent.editPanel.setActiveTab(this.tab);
        this.parent.editPanel.updateLayout();
    },
    showInfo: function () {
        var footer = this.tab.getDockedComponent('footer');
        footer.removeAll();
        footer.add({
            text: t("save"),
            iconCls: "pimcore_icon_apply"
            //handler: this.save.bind(this)
        });
    },

    tabactivated: function () {
        this.setupChangeDetector();
        this.tabdestroyed = false;
    },

    tabdestroy: function () {
        this.tabdestroyed = true;
    },

    getBasicConfiguration: function () {
        let basicConfig = new pimcore.plugin.distributionhub.tabs.basicConfig(this.data, this.pimId, this.parent, this.parentType);
        return basicConfig.getFormPanel();
    },
    getColumnConfiguration: function () {
        this.mappingAttributeSetting = this.data.columnAttributeMapping;
        this.columnMappingPanel = new pimcore.plugin.distributionhub.tabs.columnConfiguration(this.data, this.parentType);
        return this.columnMappingPanel.getPanel();
    },

    getFilters: function (filtersConfig) {
        return filtersConfig.getFilters();
    },

    getPreview: function (filtersConfig) {
        return filtersConfig.getResults();
    },

    share: function (filtersConfig) {
        return filtersConfig.getSaveAndShare();
    },
    getShare: function () {
        let shareConfig = new pimcore.plugin.distributionhub.tabs.shareConfig(this.data, this.pimId, this.parent);
        return shareConfig.getSharePanel();
    },
    getScheduleConfiguration: function () {
        let scheduleConfig = new pimcore.plugin.distributionhub.tabs.scheduleConfig(this.data, this.pimId, this.parent);
        return scheduleConfig.getGridPanel();
    },

    onAdd: function (type) {
        this.showEntitySelectionDialog(type);
    },

    updateData: function (data, grid) {
    },

    save: function () {
        Ext.Ajax.request({
            url: "/admin/distributionhub/channel/save",
            params: {
                data: saveData,
                modificationDate: this.modificationDate
            },
            method: "post",
            success: function (response) {
                var rdata = Ext.decode(response.responseText);
                if (rdata && rdata.success) {
                    pimcore.helpers.showNotification(t("success"), t("Configuration save successfully"), "success");
                    this.modificationDate = rdata.modificationDate;
                    this.resetChanges();
                } else {
                    pimcore.helpers.showNotification(t("error"), t("Configuration save error"), "error", t(rdata.message));
                }
            }.bind(this)
        });
    }

});