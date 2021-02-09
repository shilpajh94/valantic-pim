pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.numeric");
pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.numeric = Class.create(pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.default, {

    getConditionPanel: function() {

        var termFieldValue = "",
            operatorValue = "";

        if(this.data.filterEntryData && isNaN(this.data.filterEntryData)) {

            var key = Object.keys(this.data.filterEntryData)[0];
            if(key) {
                termFieldValue = this.data.filterEntryData[key];
                operatorValue = key;
            }
        } else {
            termFieldValue = this.data.filterEntryData;
            operatorValue = "eq";
        }

        this.termField = Ext.create('Ext.form.field.Number',
            {
                width: 250,
                style: "margin-left: 40px",
                labelWidth: 40,
                fieldLabel:  t("dHub_term"),
                allowDecimals:true,
                decimalPrecision: 4,
                value: termFieldValue
            }
        );
 
        if(this.data.operator === "exists" || this.data.operator === "not_exists"){
            this.termField.setDisabled(true);
        }
        
        return Ext.create('Ext.panel.Panel', {
            layout: 'hbox',
            items: [
                this.getOperatorCombobox(operatorValue),
                this.termField 
            ]
        });
    },

    getFilterValues: function() {

        var filterEntryData = {},
            operator = "must",
            operatorFieldValue = this.operatorField.getValue();

        if(operatorFieldValue === "eq") {
            filterEntryData = this.termField.getValue();
        } else {
            filterEntryData[operatorFieldValue] = this.termField.getValue();
        }

        if(operatorFieldValue === "exists" || operatorFieldValue === "not_exists") {
            operator = operatorFieldValue;
        }
        return {
            fieldname: this.fieldSelectionInformation.fieldName,
            filterEntryData: filterEntryData,
            operator: operator
        };

    }

});
