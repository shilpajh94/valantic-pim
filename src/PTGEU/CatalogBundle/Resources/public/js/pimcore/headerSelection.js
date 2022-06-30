/**
 * 
 * @class headerSelection
 * @desc This file is used to create new panel for headerSelection
 * @version 1.0
 *
 */

pimcore.registerNS("pimcore.plugin.headerSelection");

pimcore.plugin.headerSelection = Class.create({

    attachHeader: function (object, type, e= null) {
       
        var headerFieldIndex = 2;
        var objectClassName = object.data.general.o_className;

        if (objectClassName == 'PTGEUCatalogCategoryAndTable') {
            var headerDataFieldName = 'Columns';
            var dataFields = object.edit.dataFields;
            var headerDataComponent = dataFields[headerDataFieldName].component;
            var headerFieldSet = object.edit.layout.items.items[0].items.items[headerFieldIndex];
            var headerData = [];

            Ext.Ajax.request({
                url: '/ptgeu_catalog/get-available-headers',
                async: false,
                params: {
                    table: e.value
                },
                success: function (response) {

                    headerData = JSON.parse(response.responseText);
                }.bind(this),
                error: function (response) {
                    console.log(response, "error")
                }.bind(this)
            });

            var storeData = headerData.storeData;
            var completeData = headerData.completeData;
           
            var my_array_store = Ext.create('Ext.data.ArrayStore', {
                fields: ['some_value', 'some_text'],
                data: storeData,
                autoLoad: true,
                sortInfo: {
                    field: 'value',
                    direction: 'ASC'
                }
            });

            let itemSelectorValues = this.getValuesForItemSelector(headerDataComponent);
            var head = headerFieldSet.items.find(k=> (k.name == 'header-selector'));
            if(head == undefined)
            {
                var my_item_selector_instance = Ext.create("Ext.ux.form.ItemSelector", {
                    hideNavIcons: false,
                    store: my_array_store,
                    displayField: 'some_text',
                    width: 700,
                    name:'header-selector',
                    valueField: 'some_value',
                    allowBlank: false,
                    value: itemSelectorValues,
                    msgTarget: 'side',
                    fromTitle: 'Available',
                    toTitle: 'Selected',
                    listeners: {
                        change: function (field, newValue, oldValue, eOpts) {
                            let selectedHeaders = my_item_selector_instance.getValue();

                            // setting selected headers in selectedHeadersField
                            let formatedSelectedHeaders = this.formatHeaderDataForSave(selectedHeaders, completeData);
                            formatedSelectedHeaders = JSON.stringify(formatedSelectedHeaders);
                            headerDataComponent.setValue(formatedSelectedHeaders);

                        }.bind(this)
                    }
                });
                headerFieldSet.insert(0, my_item_selector_instance);
            }
            else
            {
                head.setStore(my_array_store);
                head.setValue(this.getValuesForItemSelector(headerDataComponent));
            }
        }

    }, getHeaderData: function (headerDataComponent) {

        let returnData = undefined;
        if (headerDataComponent.getValue()) {
            returnData = JSON.parse(headerDataComponent.getValue());
        }

        return returnData;
    },
    getValuesForItemSelector: function (headerDataComponent) {
        let savedData = this.getHeaderData(headerDataComponent);
        let returnData = [];
        for (var key in savedData) {
            if (savedData.hasOwnProperty(key)) {
                let value = savedData[key];
                returnData.push(value.columnName);
            }
        }
        return returnData;
    },
    formatHeaderDataForSave: function (data, completeData) {
        let returnData = {};

        for (let i = 0; i < data.length; i++) {
          
            var completeHeaderData = completeData[data[i]];
            let header = {
                "columnName": data[i],
                "columnLabel": completeHeaderData.fieldLabel,
                "fieldType": completeHeaderData.fieldType,
                "groupName": completeHeaderData.groupName,
                "unitName": completeHeaderData.unitName,
                "columnWidth": completeHeaderData.columnWidth,
                "fieldLevel": completeHeaderData.fieldLevel,
                "objectBrickType": completeHeaderData.objectBrickType,
                "objectBrickName": completeHeaderData.objectBrickName,
            };
            returnData[data[i]] = header;
        }
        return returnData;
    },

});