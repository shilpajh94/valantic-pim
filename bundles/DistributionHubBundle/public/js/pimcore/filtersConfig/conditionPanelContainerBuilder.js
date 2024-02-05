pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.conditionPanelContainerBuilder");
pimcore.bundle.distributionhub.filtersConfig.conditionPanelContainerBuilder = Class.create({

    initialize: function(classId, parentPanel, panelId, conditionEntryPanelLayout, channelInfo) {
        this.classId = classId;
        this.parentPanel = parentPanel;
        this.panelId = panelId;
        this.conditionEntryPanelLayout = conditionEntryPanelLayout; 
        this.channelInfo = channelInfo;
    },

    buildConditionsContainerInner: function() {
 
        var toggleGroup = "panel_" + this.panelId;
        this.conditionsContainerInner = Ext.create('Ext.panel.Panel',{
            tbar: [
                {
                    iconCls: "pimcore_icon_add",
                    handler: function (type, data) {
                        this.addConditionEntryPanel(this.parentPanel, this.classId, this.conditionEntryPanelLayout, this.conditionsContainerInner);
                    }.bind(this)
                }
            ],
            
            collapsible: true,
            title: t("dHub_add_filters"),
            border: false,
            items: []
        });

        return this.conditionsContainerInner;

    },

    addConditionEntryPanel: function(data) {

        var itemClass = new pimcore.bundle.distributionhub.filtersConfig.conditionEntryPanel(this.classId, this.conditionEntryPanelLayout);
        var item = itemClass.getConditionPanel(this.parentPanel, data, this.channelInfo);
        this.conditionsContainerInner.add(item);
        item.updateLayout();
        this.conditionsContainerInner.updateLayout();
    },

    populateConditionsContainerInner: function(dataArray) {

        if(dataArray && Array === dataArray.constructor) {
            for(var i = 0; i < dataArray.length; i++) {

                var filterData = dataArray[i];
                if(filterData.fieldname == "~~group~~") {
                    this.addConditionGroupPanel(filterData);
                } else {
                    this.addConditionEntryPanel(filterData);
                }

            }
        }
    }


});
