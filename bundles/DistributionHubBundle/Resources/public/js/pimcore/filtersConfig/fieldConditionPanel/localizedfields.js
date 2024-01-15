
pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.localizedfields");
pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.localizedfields = Class.create(pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.default, {

    getConditionPanel: function() {
        var language = ""; 
        var subData = null;
        
        if(this.data && this.data.filterEntryData) {
            language = Object.keys(this.data.filterEntryData)[0];
            
            if(language) {
                subData = this.data.filterEntryData[language][0];
            }
            
        }
    
        this.languageField = Ext.create('Ext.form.ComboBox',
            {
                fieldLabel: t("dHub_language"),
                name: "language",
                store: this.fieldSelectionInformation.context.languages,
                value: language,
                queryMode: 'local',
                width: 200,
                labelWidth: 70,
                displayField: 'data',
                forceSelection: true
            }
        );
 
        if(this.data.channelInfo) {
            langauge = this.data.channelInfo.language;
            this.languageField.setValue(langauge);
        }

        this.subPanel = new pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel[this.fieldSelectionInformation.context.subType](this.fieldSelectionInformation, subData);

        return Ext.create('Ext.panel.Panel', {
            items: [
                this.languageField,
                this.subPanel.getConditionPanel()
            ]

        });
    },


    getFilterValues: function() {
        var subValue = {}; 
        subValue[this.languageField.getValue()] = [this.subPanel.getFilterValues()];
        
        return {
            "fieldname": this.fieldSelectionInformation.fieldType,
            "filterEntryData": subValue
        };
    }


});
