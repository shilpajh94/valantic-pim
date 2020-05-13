/**
 * 
 * @class headerSelection
 * @desc This file is used to create new panel for headerSelection
 * @version 1.0
 *
 */

pimcore.registerNS("pimcore.plugin.headerSelection");

pimcore.plugin.headerSelection = Class.create({

    /*
     * @constructor
     */
    initialize: function () {
        //this.helper = new pimcore.plugin.lpeHelper();
    },

    // addIdColumn: true,

    // idColumnConfig: {columnLabel: 'Pimcore Id', columnName: 'id', columnWidth: 100},

    attachHeader: function (object, type) {

        var tabIndexContainingConfiguration = 0;
        var objectClassName = object.data.general.o_className;


        if (objectClassName == 'CatalogTables') {
            var headerDataFieldName = 'Columns';
            var dataFields = object.edit.dataFields;
            var headerDataComponent = dataFields[headerDataFieldName].component;
            // console.log(headerDataComponent);
            
            var objectEditParentPanel = object.edit.layout.items.items[0];
            
            var objectEditParentPanelItems = objectEditParentPanel.items;
            // console.log(objectEditParentPanelItems);
            var panelContainingConfiguration = objectEditParentPanelItems.items[tabIndexContainingConfiguration];

            var panelContainingConfigurationItems = panelContainingConfiguration.items.getRange();
            var filterFieldSet = panelContainingConfigurationItems[0];
            var headerFieldSet = panelContainingConfigurationItems[1];
            var headerData = [];
            Ext.Ajax.request({
                url: "/catalog/get-available-headers",
                async: false,
                params: {
                  
                    o_id: object.data.general.o_id,
                    o_parentId: object.data.general.o_parentId
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

            var my_item_selector_instance = Ext.create("Ext.ux.form.ItemSelector", {
                // anchor: '100%',
                // fieldLabel: 'Headers',
                hideNavIcons: false,
                // imagePath: '../ux/images/',
                store: my_array_store,
                displayField: 'some_text',
                width: 700,
                valueField: 'some_value',
                allowBlank: false,
                value: itemSelectorValues,
                msgTarget: 'side',
                fromTitle: 'Available',
                toTitle: 'Selected',
                listeners: {
                    change: function (field, newValue, oldValue, eOpts) {
                        // console.log(my_item_selector_instance);
                        // console.log(my_item_selector_instance);
                        let selectedHeaders = my_item_selector_instance.getValue();
                        // console.log(selectedHeaders);
                        // console.log(completeData);
                        // setting selected headers in selectedHeadersField
                        let formatedSelectedHeaders = this.formatHeaderDataForSave(selectedHeaders, completeData);
                        formatedSelectedHeaders = JSON.stringify(formatedSelectedHeaders);
                        console.log(formatedSelectedHeaders);
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
                        // console.log('afterlayout');
                    },
                }
            });
            headerFieldSet.insert(0, my_item_selector_instance);
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

        // now doing this in php for applied header
        // if (data.length > 0) {
        //     returnData['id'] = this.idColumnConfig;
        // }

        for (let i = 0; i < data.length; i++) {
            console.log(completeData)
            var completeHeaderData = completeData[data[i]];
            // console.log(completeHeaderData)
            header = {
                "columnName": data[i],
                "columnLabel": completeHeaderData
                // "columnName": data[i],
                // "columnWidth": completeHeaderData[1],
                // "columnLabel": completeHeaderData[2]
            };
            returnData[data[i]] = header;
        }
        return returnData;
    },

});

var headerSelection = new pimcore.plugin.headerSelection();
