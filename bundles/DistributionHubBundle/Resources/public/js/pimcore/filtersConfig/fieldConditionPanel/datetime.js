/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */


pimcore.registerNS("pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.datetime");
pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.datetime = Class.create(pimcore.bundle.distributionhub.filtersConfig.fieldConditionPanel.numeric, {

    showTimeField: true,
    showDateField: true,

    getConditionPanel: function() {

        var termFieldValue = "";
        var operatorValue = "";
        if(typeof this.data.filterEntryData === "string") {

            termFieldValue = this.data.filterEntryData;
            operatorValue = "eq";


        } else if(this.data.filterEntryData) {
            var key = Object.keys(this.data.filterEntryData)[0];
            if(key) {
                termFieldValue = this.data.filterEntryData[key];
                operatorValue = key;
            }

        }

        var dateObject = null;
        if(termFieldValue) {
            dateObject = new Date(Date.parse(termFieldValue));
        }
        
        this.datefield = Ext.create('Ext.form.field.Date', {
            width: 205,
            format: 'm/d/Y',
            value: dateObject,
            hidden: !this.showDateField

        });
        
        if(this.datefield.hidden === true){
            var timeWidth = 205;
            var fieldName = t("dHub_time");
        } else {
            var timeWidth = 95;
            var fieldName = t("dHub_date");
        }
        

        
        this.timefield = Ext.create('Ext.form.field.Time', {
            width: timeWidth,
            format:"H:i",
            emptyText:"",
            value: dateObject,
            hidden: !this.showTimeField
        });
 

        if(this.data.operator === "exists" || this.data.operator == "not_exists"){
            this.timefield.setDisabled(true);
            this.datefield.setDisabled(true);
        }
        
        var operatorCombobox = this.getOperatorCombobox(operatorValue);
        operatorCombobox.on('change', function( item, newValue, oldValue, eOpts ) {
            if(this.datefield) {
                this.datefield.setDisabled(newValue == "exists" || newValue == "not_exists");
                this.datefield.setValue(null);
            }
            if(this.timefield) { 
                this.timefield.setDisabled(newValue == "exists" || newValue == "not_exists");
                this.timefield.setValue(null);
            }
        }.bind(this));


        return Ext.create('Ext.panel.Panel', {
            layout: 'hbox',
            items: [
                operatorCombobox,
                {
                    xtype: 'fieldcontainer',
                    layout: 'hbox',
                    fieldLabel: fieldName,
                    style: "margin-left: 40px",
                    labelWidth: 40,
                    items: [this.datefield, this.timefield]
                }
            ]
        });
    },


    getFilterValues: function() {

        var filterEntryData = {};
        var operatorFieldValue = this.operatorField.getValue();


        var value = this.datefield.getValue();
        var dateString = "";
        
        
        if(value) { 
            if (this.timefield.getValue()) {
                dateString = Ext.Date.format(value, "Y-m-d");
                var timeValue = this.timefield.getValue();
                timeValue = Ext.Date.format(timeValue, "H:i:s");

                dateString += "T" +  timeValue; 
            }
            else {
                dateString = Ext.Date.format(value, 'Y-m-d\\TH:i:s');
            }
        }


        if(operatorFieldValue == "eq") {
            filterEntryData = dateString
        } else {
            filterEntryData[operatorFieldValue] = dateString;
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
