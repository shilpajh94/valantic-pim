/**
 * Pimcore global services
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright Copyright (c) Pimcore global services
 * @license Pimcore global services GPLv3 and PEL
 */
// alert('ZZZ')
pimcore.registerNS("pimcore.plugin.formattedGridHandler");
pimcore.plugin.formattedGridHandler = Class.create(pimcore.plugin.admin, {

    /**
     * constructor
     * @param object
     * @param dataTransporter
     */
    initialize: function (object) {
        this.object = object;
    },

    setUpFormattedGrid: function () {
        // alert('yes');
        var objectClassName = this.object.data.general.o_className;
        let dataFields = this.object.edit.dataFields;
        if (objectClassName == 'CatalogTables') {
            var objectId = this.object.id;
            let headerDataFieldName = 'Columns';
            let tabIndexContainingFormatedTable = 1;
            let indexOfFormattedTableOnTab = 0;
            let objectEditParentPanel = this.object.edit.layout.items.items[0];
            let objectEditParentPanelItems = objectEditParentPanel.items;
            let panelContainingFormattedTable = objectEditParentPanelItems.items[tabIndexContainingFormatedTable];
            let appliedHeaderDataComponent = dataFields[headerDataFieldName].component;
            
            if (appliedHeaderDataComponent.getValue()) {
                initialHeaderData = JSON.parse(appliedHeaderDataComponent.getValue());
            }
            
            panelContainingFormattedTable.addListener('afterrender', function (element) {
                let formattedDataFieldSet = element.items.getRange()[0];
//                console.log(formattedDataFieldSet);
                let formattedTableCompleteField = element.items.getRange()[indexOfFormattedTableOnTab];
                 console.log(formattedTableCompleteField);
                let formattedTableGrid = formattedTableCompleteField.items.getRange()[0];
                // when the price list table is loaded: if some applied headers are saved in the hidden areablock field
                // and the grid does not have any data then add the columns forcefully on the grid

                // if applied header data component has some saved applied headers
                if(initialHeaderData !== null && Object.keys(initialHeaderData).length > 0  ){
                    // if grid has only one row
//                    if(formattedTableGrid.store.data.length === 1 ){
//                        let data = formattedTableGrid.store.data;
//                        if(data.items[0].data.hasOwnProperty('col_0') &&  data.items[0].data.col_0 === "" ){
//                            Ext.Ajax.request({
//                                url: "/",
//                                params: {
//                                    objectId: objectId
//                                },
//                                async: false,
//                                success: function (response) {
//                                    response = Ext.decode(response.responseText);
//
//                                    let headerData = response.headerData;
//
//                                    headerData = Ext.decode(headerData);
//
//                                    let gridColumns = this.getGridColumns(headerData);
//                                    let store = formattedTableGrid.getStore();
//                                    store.removeAt(0);
//
//                                    let headerArray = response.headerArray;
//                                    let headerJson = [];
//                                    for(var i = 0;i < headerArray.length; i++){
//                                        headerJson.push({'name' : headerArray[i] });
//                                    }
//                                    store.initialConfig.fields = headerJson;
//
//                                    store.getInitialConfig = function(){
//                                        return store.initialConfig;
//                                    };
//
//                                    formattedTableGrid.reconfigure(store,gridColumns);
//
//                                }.bind(this)
//                            });
//                        }
//                    }
                }


                // setting formattedTableGrid instance for transporter
//                this.dataTransporter.setFormattedGrid(formattedTableGrid);
//                // customization for grid headers
//                this.setGridHeaderProperties(formattedTableGrid, initialHeaderData);
//                // add custom columns to grid (serial number,up,down,remove,open)
//                this.decorateGrid(formattedTableGrid, appliedHeaderDataComponent);
//                // to enable column editing for price and remarks
//                this.enableColumnEditing(formattedTableGrid);

                this.updateTableButton = Ext.create('Ext.Button', {
                    text: 'Update Table',
                    tooltip: 'Generate articles list table using saved configuration',
                    style: {
                        'margin-bottom': '10px'
                    },
                    // scale:"medium",
                    iconCls: "plt_icon_plt_generate_button_icon",
                    cls: "plt_lightgrey_button",
                    handler: function () {
                        this.disableUpdateButtons();
                        let selectionTableFieldset = element.items.getRange()[2];
                        let selectionTableGrid = selectionTableFieldset.items.getRange()[indexOfSelectionTableOnFieldset];

                        this.updateFormattedGrid(formattedTableGrid, appliedHeaderDataComponent, selectionTableGrid, gridDataComponent, this.object);
                        // this.copyHeaderData(headerDataComponent, appliedHeaderDataComponent);
                        dataFlagComponent.setValue(true);
                        generatetableFlagComponent.setValue(true);
                    }.bind(this)
                });

                // button to update prices only
                this.updatePriceButton = Ext.create('Ext.Button', {
                    text: 'Update Prices',
                    tooltip: 'Update the prices in the table without changing other data',
                    iconCls: "plt_icon_plt_update_price_button_icon",
                    cls: 'plt_lightgrey_button',
                    style: {
                        'margin-bottom': '10px'
                    },
                    handler: function () {
                        this.disableUpdateButtons();
                        this.updatePricesInFormattedGrid(formattedTableGrid, this.object, appliedHeaderDataComponent);
                    }.bind(this)
                });

                this.cancelUpdateButton = Ext.create('Ext.Button', {
                    text: 'Cancel Update',
                    tooltip: 'Cancel the update table request',
                    iconCls: "plt_icon_plt_update_table_cancel_button_icon",
                    cls: 'plt_lightgrey_button',
                    hidden: true,
                    style: {
                        'margin-bottom': '10px'
                    },
                    handler: function () {
                        this.cancelUpdateTable();
                    }.bind(this)
                });


//                let buttonClassObj = new pimcore.plugin.formattedGridHeaderWidthManager(formattedTableGrid,appliedHeaderDataComponent,this.object);
//                let button = buttonClassObj.getButton();

//                formattedDataFieldSet.insert(0,button);
                formattedDataFieldSet.insert(0, this.updateTableButton);
//                formattedDataFieldSet.insert(2, this.updatePriceButton);
//                formattedDataFieldSet.insert(3, this.cancelUpdateButton);


                //this.hideControls(formattedTableGrid);
                // this.setGridNonEditable(formattedTableGrid);
                // enable working of resize event
                // had to disable because setWidth was getting called when setting width initially
                // we do not want to capture new width on that initial change
                setTimeout(function () {
                    this.activateResizeEvent = true;
                }.bind(this), 100);

            }.bind(this));
        }
    },


    
});

var formattedGridHandler = new pimcore.plugin.formattedGridHandler();
