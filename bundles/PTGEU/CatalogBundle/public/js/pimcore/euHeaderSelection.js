/**
 * 
 * @class euHeaderSelection
 * @desc This file is used to create new panel for euHeaderSelection
 * @version 1.0
 *
 */

pimcore.registerNS("pimcore.plugin.euHeaderSelection");

pimcore.plugin.euHeaderSelection = Class.create({

    attachEUHeaders: function (e) {
        var headerFieldIndex = 1;
        var sorterFieldIndex = 3;
        var objectClassName = e.detail.object.data.general.className;

        if (objectClassName == 'PTGEUCatalogCategory') {
            var headerDataFieldName = 'Columns';
            var sortingDataFieldName = 'SortingColumns';
            var dataFields = e.detail.object.edit.dataFields;
            var headerDataComponent = dataFields[headerDataFieldName].component;
            var sortingDataComponent = dataFields[sortingDataFieldName].component;
            var headerFieldSet = e.detail.object.edit.layout.items.items[0].items.items[headerFieldIndex];
            var sorterFieldSet = e.detail.object.edit.layout.items.items[0].items.items[sorterFieldIndex];
            var headerData = [];
            var sorterData = [];

            Ext.Ajax.request({
                url: '/ptgeucatalog/get-available-headers',
                async: false,
                success: function (response) {

                    headerData = JSON.parse(response.responseText);
                }.bind(this),
                error: function (response) {
                    console.log(response, "error")
                }.bind(this)
            });

            Ext.Ajax.request({
                url: '/ptgeucatalog/get-available-sorters',
                async: false,
                success: function (response) {

                    sorterData = JSON.parse(response.responseText);
                }.bind(this),
                error: function (response) {
                    console.log(response, "error")
                }.bind(this)
            });

            
            var storeData = headerData.storeData;
            var completeData = headerData.completeData;
            var defaultColumns = headerData.defaultColumns;

            var sorterDtoreData = sorterData.storeData;
            var sorterCompleteData = sorterData.completeData;
            var sorterDefaultColumns = sorterData.defaultColumns;
            
           
            var my_array_store = Ext.create('Ext.data.ArrayStore', {
                fields: ['some_value', 'some_text'],
                data: storeData,
                autoLoad: true,
                sortInfo: {
                    field: 'value',
                    direction: 'ASC'
                }
            });

            var my_sorter_array_store = Ext.create('Ext.data.ArrayStore', {
                fields: ['some_value', 'some_text'],
                data: sorterDtoreData,
                autoLoad: true,
                sortInfo: {
                    field: 'value',
                    direction: 'ASC'
                }
            });

            let itemSelectorValues = this.getValuesForItemSelector(headerDataComponent);
            let sorterItemSelectorValues = this.getValuesForItemSelector(sortingDataComponent);
            console.log(sorterItemSelectorValues)

            if(!itemSelectorValues.length)
            {
                itemSelectorValues = defaultColumns;
            }

            if(!sorterItemSelectorValues.length)
            {
                sorterItemSelectorValues = sorterDefaultColumns;
            }

            var head = headerFieldSet.items.find(k=> (k.name == 'header-selector'));
            var sort = sorterFieldSet.items.find(k=> (k.name == 'sorter-selector'));
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
                            this.setDefaultColumnsSetting(headerDataComponent, my_item_selector_instance, completeData);
                        }.bind(this)
                    }
                });
                headerFieldSet.insert(0, my_item_selector_instance);
                this.setDefaultColumnsSetting(headerDataComponent, my_item_selector_instance, completeData);
            }
            else
            {
                head.setStore(my_array_store);
                head.setValue(itemSelectorValues);
            }

            if(sort == undefined)
            {
                var my_sorter_item_selector_instance = Ext.create("Ext.ux.form.ItemSelector", {
                    hideNavIcons: false,
                    store: my_sorter_array_store,
                    displayField: 'some_text',
                    width: 700,
                    name:'sorter-selector',
                    valueField: 'some_value',
                    allowBlank: false,
                    value: sorterItemSelectorValues,
                    msgTarget: 'side',
                    fromTitle: 'Available',
                    toTitle: 'Selected',
                    listeners: {
                        change: function (field, newValue, oldValue, eOpts) {
                            this.setSorterDefaultColumnsSetting(sortingDataComponent, my_sorter_item_selector_instance, sorterCompleteData);
                        }.bind(this)
                    }
                });
                sorterFieldSet.insert(0, my_sorter_item_selector_instance);
                this.setSorterDefaultColumnsSetting(sortingDataComponent, my_sorter_item_selector_instance, sorterCompleteData);
            }
            else
            {
                sort.setStore(my_sorter_array_store);
                sort.setValue(sorterItemSelectorValues);
            }
        }

    }, 
    getHeaderData: function (headerDataComponent) {

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
                returnData.push(key);
            }
        }
        return returnData;
    },
    formatHeaderDataForSave: function (data, completeData) {
        let returnData = {};

        for (let i = 0; i < data.length; i++) {
          
            var completeHeaderData = completeData[data[i]];
            let header = {
                "columnLabel": completeHeaderData.columnLabel,
                "fieldType": completeHeaderData.fieldType,
                "groupName": completeHeaderData.groupName,
                "unitName": completeHeaderData.unitName,
                "columnWidth": completeHeaderData.columnWidth,
                "fieldLevel": completeHeaderData.fieldLevel,
                "objectLevel": completeHeaderData.objectLevel,
                "objectBrickType": completeHeaderData.objectBrickType,
                "objectBrickName": completeHeaderData.objectBrickName,
            };
            returnData[data[i]] = header;
        }
        return returnData;
    },
    formatSorterHeaderDataForSave: function (data, completeData) {
        let returnData = {};

        data.forEach((currentElement, index)  => {

            if(completeData[currentElement])
            {
                returnData[currentElement] = currentElement;
            }
        });
        
        return returnData;
    },
    setDefaultColumnsSetting: function (headerDataComponent, my_item_selector_instance, completeData) {
        let selectedHeaders = my_item_selector_instance.getValue();

        // setting selected headers in selectedHeadersField
        let formatedSelectedHeaders = this.formatHeaderDataForSave(selectedHeaders, completeData);
        formatedSelectedHeaders = JSON.stringify(formatedSelectedHeaders);
        headerDataComponent.setValue(formatedSelectedHeaders);
    },

    setSorterDefaultColumnsSetting: function (headerDataComponent, my_sorter_item_selector_instance, completeData) {
        let selectedHeaders = my_sorter_item_selector_instance.getValue();

        // setting selected headers in selectedHeadersField
        let formatedSelectedHeaders = this.formatSorterHeaderDataForSave(selectedHeaders, completeData);
        formatedSelectedHeaders = JSON.stringify(formatedSelectedHeaders);
        headerDataComponent.setValue(formatedSelectedHeaders);
    }

});