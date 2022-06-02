 

pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.conditionPanel");
pimcore.bundle.distributionhub.filtersConfig.conditionPanel = Class.create({

    classId: null,
    data: {},
    conditionEntryPanelLayout: "hbox",

    initialize: function(classId, data, channelInfo, conditionEntryPanelLayout) {
        this.classId = classId;
        if(data) {
            this.data = data;
        }
        if(channelInfo){
            this.channelInfo = channelInfo;
        } 
        if(conditionEntryPanelLayout) {
            this.conditionEntryPanelLayout = conditionEntryPanelLayout;
        }
    },

    getPanel: function() {
        if(!this.panel) {
            return this.getConditionPanel();
        }

        return this.panel;
    },

    getConditionPanel: function() {
        var helper = new pimcore.bundle.distributionhub.filtersConfig.conditionPanelContainerBuilder(this.classId, this, "root-panel", this.conditionEntryPanelLayout, this.channelInfo);
        this.conditionsContainerInner = helper.buildConditionsContainerInner();

        if(this.data.filters) {
            helper.populateConditionsContainerInner(this.data.filters);
        }

        this.panel = Ext.create('Ext.panel.Panel',{
            border: false,
            items: [
                this.termField,
                this.conditionsContainerInner
            ]
        });

        return this.panel;
    },

    getSaveData: function() {
        
        var conditionsData = [];
        var conditions = this.conditionsContainerInner.items.getRange();
        for (var i=0; i<conditions.length; i++) {
            var condition = conditions[i].panelInstance.getFilterValues();
            if(condition) {
                conditionsData.push(condition);
            }
        }

        return {
            "filters": conditionsData
        };
    }



});