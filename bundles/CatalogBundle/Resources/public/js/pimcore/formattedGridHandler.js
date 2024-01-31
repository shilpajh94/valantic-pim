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
        var objectClassName = this.object.data.general.className;
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
               // console.log(formattedDataFieldSet);
                let formattedTableCompleteField = element.items.getRange()[indexOfFormattedTableOnTab];
                 
                let formattedTableGrid = formattedTableCompleteField.items.getRange()[0];
               // console.log(formattedTableGrid);

                
                // this.object.edit.layout.updateLayout();

                // when the price list table is loaded: if some applied headers are saved in the hidden areablock field
                // and the grid does not have any data then add the columns forcefully on the grid

                // if applied header data component has some saved applied headers
                // if(initialHeaderData !== null && Object.keys(initialHeaderData).length > 0  ){
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
                // }


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
                        console.log('Update Table Button Clicked');
                        Ext.Ajax.request({
                            url: "/catalog/get-table-data",
                            async: false,
                            params:{'objId' : this.object.id},
                            success: function (response) {
                                response = Ext.decode(response.responseText);

                                var store = Ext.create('Ext.data.Store', {
                                    fields  : response.fieldData,
                                    data    : {'items':response.data},
                                 //   data    : {'items':[["1","1"],['2','2']]},
                                   
                                    proxy   : {
                                        type   : 'memory',
                                        reader : {
                                          //  xtype: 'grid',
                                            type : 'json',
                                            rootProperty : 'items'
                                        }
                                    },
                                    header:true
                                });

                                 var columns = response.columnData;
                                // columns.data = response.columnData;
                                 //   console.log(this.object.data);
                                let headerJson = [];
                                
                                var table = new Catalog.pimcore.object.tags.table([["1","1"],['2','2']],this.object.edit.dataFields.ProductsData.fieldConfig);
                              //  table.getLayoutEdit();
                               // console.log(this.object.edit.dataFields.ProductsData.component.id);
                                var comp = Ext.getCmp(this.object.edit.dataFields.ProductsData.component.id);
                               // console.log(comp);
                                table.initStore(response.data,comp,this.object.edit.dataFields.ProductsData,columns);
                                console.log(this.object);
                                var headerComp = Ext.getCmp(this.object.edit.dataFields.headerData.component.id);
                               
                                headerComp.setValue(response.headerData);
                               
                               // table.getValue(store);
                               // comp.updateLayout();
                              //  table.initStore([["1","1"],['2','2']]);
                                // for(var i = 0;i < headerArray.length; i++){
                                //     headerJson.push({'name' : headerArray[i] });
                                // }

                                // headerJson.push({'name' : 'PartNumber' });
                                // headerJson.push({'name' : 'SAPNumber' });
                                // store.initialConfig.fields = headerJson;
                                // formattedTableGrid.getStore();
                               // store.load();
                               // console.log(store);
                               // columns.data = store.data;
                              //  formattedTableGrid.reconfigure(store,columns);
                               // formattedTableGrid.columns[0].data ="Sunday";
                               // formattedTableGrid.columns[0].value ="Sunday";
                             //   formattedTableGrid.columns[1].data ="Monday";
                               
                              //  formattedTableGrid.reconfigure(store,columns);
                           //     formattedTableGrid.updateLayout();
                                // formattedTableGrid.getView().refresh();
                                // formattedTableGrid.setHideHeaders(false);
                                // formattedTableGrid.hideHeaders = false;
                                // formattedTableGrid.hide
                                // console.log(formattedTableGrid);
                               // console.log(formattedTableCompleteField);
                                //this.object.edit.dataFields.ProductsData.data = [['1','2'],['3','4']];
                               //comp.markDirty();
                               //this.object.edit.dataFields.ProductsData.component.checkChangeTask = {};
                               // comp.setData([['1','2'],['3','4']]);
                              // this.object.edit.dataFields.ProductsData.dirty = true;
                             
                                // console.log(response);
                            }.bind(this)
                        });
                        
                    }.bind(this)
                });

//                formattedDataFieldSet.insert(0,button);
                panelContainingFormattedTable.insert(0, this.updateTableButton);
                
//                formattedDataFieldSet.insert(2, this.updatePriceButton);
//                formattedDataFieldSet.insert(3, this.cancelUpdateButton);


            }.bind(this));
        }
    },


    
});

var formattedGridHandler = new pimcore.plugin.formattedGridHandler();

function ddd()
{
    alert('yes');
}