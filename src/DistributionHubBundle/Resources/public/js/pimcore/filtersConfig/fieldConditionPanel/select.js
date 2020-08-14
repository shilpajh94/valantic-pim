pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.select");
pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.select = Class.create(pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.default, {

    getConditionPanel: function() {

        var optionStore =  Ext.create('Ext.data.JsonStore', {
            fields: ['key', 'value'],
            data: this.fieldSelectionInformation.context.options
        });

        this.termField = Ext.create('Ext.form.ComboBox',
            {
                fieldLabel:  t("dHub_term"), 
                store: optionStore,
                queryMode: 'local',
                width: 250,
                style: "margin-left: 40px",
                labelWidth: 40,
                valueField: 'value',
                displayField: 'key',
                value: this.data.filterEntryData,
                displayTpl: Ext.create('Ext.XTemplate',
                    '<tpl for=".">',
                    '{[Ext.util.Format.stripTags(values.key)]}',
                    '</tpl>'
                )
            }
        );

//        this.inheritanceField = Ext.create('Ext.form.field.Checkbox',
//            {
//                fieldLabel:  t("dhub_ignoreInheritance"),
//                style: "padding-left: 20px",
//                value: this.data.ignoreInheritance,
//                hidden: !this.fieldSelectionInformation.context.classInheritanceEnabled
//            }
//        );

        return Ext.create('Ext.panel.Panel', {
            layout: 'hbox',
            items: [
                this.getOperatorCombobox(this.data.operator),
                this.termField
//                this.inheritanceField
            ]
        });
    }

});
