/**
 * 
 * @class brandsortingOrder
 * @desc This file is used to create new panel for brandsortingOrder
 * @version 1.0
 *
 */

pimcore.registerNS("pimcore.plugin.brandsortingOrder");

pimcore.plugin.brandsortingOrder = Class.create({

    /*
     * @constructor
     */
    initialize: function () {
    },

    attachbrandSortingHeader: function (e) {
        var tabIndexContainingConfiguration = 2;
        var object = e.detail.object;
        var SortingColumnsFieldName = 'SortingColumns';
        var dataFields = object.edit.dataFields;
        var headerDataComponent = dataFields[SortingColumnsFieldName].component;
        var objectEditParentPanel = object.edit.layout.items.items[0];
        
        var objectEditParentPanelItems = objectEditParentPanel.items;
        var panelContainingConfiguration = objectEditParentPanelItems.items[tabIndexContainingConfiguration];
        var panelContainingConfigurationItems = panelContainingConfiguration.items.getRange();
        var headerFieldSet = panelContainingConfigurationItems[0];
        var headerData = [];
            Ext.Ajax.request({
                url: '/catalog/get-inBrand-sorting-list',
                async: false,
                params: {                
                    id: e.detail.object.data.general.id,
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
            if (headerDataComponent && completeData?.length) {
                const selectedValues = completeData.map(pair => pair[0]); // extract keys
                headerDataComponent.setValue(selectedValues); // sets selected items
            }


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
            if(head == undefined){
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
                        let formatedSelectedHeaders = this.formatHeaderDataForSave(selectedHeaders, completeData);
                        formatedSelectedHeaders = JSON.stringify(formatedSelectedHeaders);
                        headerDataComponent.setValue(formatedSelectedHeaders);
                        // trying to resolve the screen scroll to top issue on item selector value change
                        setTimeout(function(){
                            panelContainingConfiguration.setScrollY(panelContainingConfiguration.getHeight());
                        },0);

                    }.bind(this),
                    afterlayout: function(field,layout,eOpts){
                        // the scroll to up issue can be handled here as well'
                        // but this event is fired even on load and whenever a fieldcollection is added
                        // panelContainingConfiguration.setScrollY(panelContainingConfiguration.getHeight());
                    },
                }
            });
              
            headerFieldSet.insert(0, my_item_selector_instance);
            }
            else
            {
            head.setStore(my_array_store);
            head.setValue(this.getValuesForItemSelector(headerDataComponent));
            }
        

    }, 
    getHeaderData: function (headerDataComponent) {

        let returnData = undefined;
        if (headerDataComponent.getValue()) {
            // returnData = JSON.parse(headerDataComponent.getValue());
            valuesString = headerDataComponent.getValue(); // comma-separated string
            returnData = valuesString.split(','); // now you have an array

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
    formatHeaderDataForSave: function (data) {
        let returnData = {};
        for (let i = 0; i < data.length; i++) {
            const field = data[i];

            returnData[field] = {
                sortingList: field,
            };
        }

        return returnData;
    }

});

