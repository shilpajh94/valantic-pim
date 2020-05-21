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
    initialize: function (object, dataTransporter, newAddedRowTrackCustomArray) {
        this.object = object;
        this.dataTransporter = dataTransporter;
        this.newAddedRowTrackCustomArray = newAddedRowTrackCustomArray;
        // this.helper = new pimcore.plugin.lpeHelper();
    },

    attachHeader: function (object, type) {
        // alert('yes');
        var tabIndexContainingConfiguration = 0;
        var objectClassName = object.data.general.o_className;


            var objectId = object.id;
            let dataFields = object.edit.dataFields;

            // position and names of class fields ------ open
            // let headerDataFieldName = 'headerData';
            // let appliedHeaderDataFieldName = 'appliedHeaderData';
            // let gridDataFieldName = "gridData";
            // let dataFlagFieldName = "dataFlag";
            // let warningFlagFieldName = "warningFlag";
            // let generatetableFlagFieldName = "generatetableFlag";
            let tabIndexContainingFormatedTable = 1;
            let indexOfFormattedTableOnTab = 0;
            let indexOfSelectionTableOnFieldset = 0;
            // position and names of class fields ------ closed

            // fetching extjs components ------ open
            // let warningFlagComponent = dataFields[warningFlagFieldName].component;
            // let generatetableFlagComponent = dataFields[generatetableFlagFieldName].component;
            // let gridDataComponent = dataFields[gridDataFieldName].component;
            // let headerDataComponent = dataFields[headerDataFieldName].component;
            // let dataFlagComponent = dataFields[dataFlagFieldName].component;
            // let appliedHeaderDataComponent = dataFields[appliedHeaderDataFieldName].component;
            // fetching extjs components ------ closed

            let objectEditParentPanel = object.edit.layout.items.items[0];
            let objectEditParentPanelItems = objectEditParentPanel.items;
            let panelContainingFormattedTable = objectEditParentPanelItems.items[tabIndexContainingFormatedTable];

            // let initialHeaderData = null;
            // if (appliedHeaderDataComponent.getValue()) {
            //     initialHeaderData = JSON.parse(appliedHeaderDataComponent.getValue());
            // }
            // alert('index-'+tabIndexContainingFormatedTable);
            let bb = Ext.create('Ext.Button', {
                text: 'Generate Article Data',
                renderTo: Ext.getBody(),
                handler: function() {
                    alert('You clicked the button!');
                   
                    
                }
            });
            
            Ext.Ajax.request({
                url: "/catalog/get-table-data",
                async: false,
                success: function (response) {
                    response = Ext.decode(response.responseText);
                    console.log(response);
                }.bind(this)
            });
            
            panelContainingFormattedTable.addListener('afterrender', function (element) {

                

                // console.log(element);
                // console.log(element.items.items.getRange()[0]);

                // alert('NNNNNN')
                // let formattedDataFieldSet = element.items.getRange()[1];
                // console.log(formattedDataFieldSet)
                // let formattedTableCompleteField = formattedDataFieldSet.items.getRange()[indexOfFormattedTableOnTab];
                // let formattedTableGrid = formattedTableCompleteField.items.getRange()[0];

                // // when the price list table is loaded: if some applied headers are saved in the hidden areablock field
                // // and the grid does not have any data then add the columns forcefully on the grid

                // // if applied header data component has some saved applied headers
                // if(initialHeaderData !== null && Object.keys(initialHeaderData).length > 0  ){
                //     // if grid has only one row
                    // if(formattedTableGrid.store.data.length === 1 ){
                    //     let data = formattedTableGrid.store.data;
                    //     if(data.items[0].data.hasOwnProperty('col_0') &&  data.items[0].data.col_0 === "" ){
                //             // Ext.Ajax.request({
                //             //     url: "/catalog/get-table-data",
                //             //     // params: {
                //             //     //     objectId: objectId
                //             //     // },
                //             //     async: false,
                //             //     success: function (response) {
                //             //         response = Ext.decode(response.responseText);
                //             //         console.log(response);

                //             //         // let headerData = response.headerData;

                //             //         // headerData = Ext.decode(headerData);

                //             //         // let gridColumns = this.getGridColumns(headerData);
                //             //         // let store = formattedTableGrid.getStore();
                //             //         // store.removeAt(0);

                //             //         // let headerArray = response.headerArray;
                //             //         // let headerJson = [];
                //             //         // for(var i = 0;i < headerArray.length; i++){
                //             //         //     headerJson.push({'name' : headerArray[i] });
                //             //         // }
                //             //         // store.initialConfig.fields = headerJson;

                //             //         // store.getInitialConfig = function(){
                //             //         //     return store.initialConfig;
                //             //         // };

                //             //         // formattedTableGrid.reconfigure(store,gridColumns);

                //             //     }.bind(this)
                //             // });
                //     //     }
                //     // }
                // // }


                
                // Ext.create('Ext.Button', {
                //     text: 'NNNNNN',
                //     renderTo: Ext.getCmp(''),
                //     handler: function() {
                //         alert('You clicked the button!');
                //     }
                // });
                // this.updateTableButton = Ext.create('Ext.Button', {
                //     text: 'Update Table',
                //     tooltip: 'Generate price list table using saved configuration',
                //     style: {
                //         'margin-bottom': '10px'
                //     },
                //     // scale:"medium",
                //     iconCls: "plt_icon_plt_generate_button_icon",
                //     cls: "plt_lightgrey_button",
                //     handler: function () {
                        
                        
                //     }.bind(this)
                // });

                

            }.bind(this));
    },


    
});

var formattedGridHandler = new pimcore.plugin.formattedGridHandler();
