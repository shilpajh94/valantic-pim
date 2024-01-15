
pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.quantityValue");
pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.quantityValue = Class.create(pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.numeric, {

    getConditionPanel: function() {

        var termFieldValue = "";
        var unitFieldValue = "";
        var operatorValue = "";

        if(this.data.filterEntryData) { 
            if(isNaN(this.data.filterEntryData.value)) {
                var key = Object.keys(this.data.filterEntryData.value)[0];
                var value = Object.values(this.data.filterEntryData.value)[0];
//                var term = Object.values(this.data.filterEntryData.unit)[0];
                if(key) {
                    termFieldValue = value;
                    unitFieldValue = this.data.filterEntryData.unit;
                    operatorValue = key;
                }

            } else {  
                termFieldValue = this.data.filterEntryData.value;
                unitFieldValue = this.data.filterEntryData.unit;
                operatorValue = "eq";
            }

        }

        this.unitStore = new Ext.data.JsonStore({
            autoDestroy: true,
            root: 'data',
            fields: ['id', 'abbreviation']
        });


        this.termField = Ext.create('Ext.form.field.Number',
            {
                width: 110, 
                labelWidth: 40,
                allowDecimals:true,
                value: termFieldValue
            }
        );
        
        pimcore.helpers.quantityValue.initUnitStore(this.setUnitStoreData.bind(this), this.fieldSelectionInformation.context.units);
 
        this.unitField = Ext.create('Ext.form.ComboBox',
            {
                store: this.unitStore,
                value: unitFieldValue,
                queryMode: 'local',
                width: 100,
                valueField: 'id',
                displayField: 'abbreviation',
                forceSelection: true
            }
        );

        if(this.data.operator === "exists" || this.data.operator == "not_exists"){
            this.termField.setDisabled(true);
            this.unitField.setDisabled(true);
        }
        
        return Ext.create('Ext.panel.Panel', {
            layout: 'hbox',
            items: [
                this.getOperatorCombobox(operatorValue),
                {
                    xtype: "fieldcontainer",
                    width: 330,
                    style: "margin-left: 40px",
                    labelWidth: 40,
                    layout: 'hbox',
                    fieldLabel:  t("dHub_term"),
                    items: [
                        this.termField,
                        this.unitField
                    ]
                }
            ]
        });
    },

    setUnitStoreData: function(data) {
        this.unitStore.loadData(data.data);

        if (this.unitField) {
            this.unitField.reset();
        }

    },

    getFilterValues: function() {

        var filterEntryData = {
            unit: this.unitField.getValue(),
            value: {}
        };
        var operatorFieldValue = this.operatorField.getValue();


        if(operatorFieldValue == "eq") {
            filterEntryData.value = this.termField.getValue()
        } else {
            filterEntryData.value[operatorFieldValue] = this.termField.getValue();
        }


        var operator = "must";
        if(operatorFieldValue == "exists" || operatorFieldValue == "not_exists") {
            operator = operatorFieldValue;
        }

        return {
            fieldname: this.fieldSelectionInformation.fieldName,
            filterEntryData: filterEntryData,
            operator: operator
        };

    }

});
