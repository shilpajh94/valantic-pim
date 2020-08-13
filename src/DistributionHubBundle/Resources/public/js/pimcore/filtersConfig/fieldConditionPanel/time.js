pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.time");
pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.time = Class.create(pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.datetime, {

    showDateField: false,

    getFilterValues: function() {

        var filterEntryData = {};
        var operatorFieldValue = this.operatorField.getValue();

        var dateString = "0000-01-01";
        if (this.timefield.getValue()) {
            var timeValue = this.timefield.getValue();
            timeValue = Ext.Date.format(timeValue, "H:i:s");

            dateString += "T" +  timeValue;
        }
 
        if(operatorFieldValue == "eq") {
            filterEntryData = dateString
        } else {
            filterEntryData[operatorFieldValue] = dateString;
        }
        
        var operator = "must";
        if(operatorFieldValue == "exists" || operatorFieldValue == "not_exists") {
            
            if(filterEntryData.exists){
                filterEntryData.exists = null;
            }
            if(filterEntryData.not_exists){
                filterEntryData.not_exists = null;
            }
            
            operator = operatorFieldValue;
        }

        return {
            fieldname: this.fieldSelectionInformation.fieldName,
            filterEntryData: filterEntryData,
            operator: operator
        };

    }

});
