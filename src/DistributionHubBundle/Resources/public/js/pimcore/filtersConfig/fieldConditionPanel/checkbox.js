pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.checkbox");
pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.checkbox = Class.create(pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.default, {

    getConditionPanel: function() {
 

        return Ext.create('Ext.panel.Panel', {
            layout: 'hbox',
            items: [
                this.getOperatorCombobox(this.data.operator)
            ]
        });
    },

    getFilterValues: function() {

       return {
            fieldname: this.fieldSelectionInformation.fieldName,
            filterEntryData: this.operatorField.getValue() == "true",
            operator: "true"
        };

    }


});
