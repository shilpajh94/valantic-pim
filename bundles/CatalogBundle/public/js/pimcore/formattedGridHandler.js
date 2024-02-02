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
pimcore.plugin.formattedGridHandler = Class.create({

    
    
    initialize: function () {
        // this.object = event;
    },

    setUpFormattedGrid: function (e) {
        // alert('yes');
        var objectClassName = e.detail.object.data.general.className;
        let dataFields = e.detail.object.edit.dataFields;
        if (objectClassName == 'CatalogTables') {
            var objectId = e.detail.object.id;
            let headerDataFieldName = 'Columns';
            let tabIndexContainingFormatedTable = 1;
            let indexOfFormattedTableOnTab = 0;
            let objectEditParentPanel = e.detail.object.edit.layout.items.items[0];
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
                            params:{'objId' : e.detail.object.id},
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
                                 //   console.log(e.detail.object.data);
                                let headerJson = [];
                                
                                var table = new Catalog.pimcore.object.tags.table([["1","1"],['2','2']],e.detail.object.edit.dataFields.ProductsData.fieldConfig);
                              //  table.getLayoutEdit();
                               // console.log(e.detail.object.edit.dataFields.ProductsData.component.id);
                                var comp = Ext.getCmp(e.detail.object.edit.dataFields.ProductsData.component.id);
                               // console.log(comp);
                                table.initStore(response.data,comp,e.detail.object.edit.dataFields.ProductsData,columns);
                                console.log(e.detail.object);
                                var headerComp = Ext.getCmp(e.detail.object.edit.dataFields.headerData.component.id);
                               
                                headerComp.setValue(response.headerData);
                                
                            }.bind(this)
                        });
                        
                    }.bind(this)
                });

                panelContainingFormattedTable.insert(0, this.updateTableButton);
                
            }.bind(this));
        }
    }.bind(this),


    
});

var formattedGridHandler = new pimcore.plugin.formattedGridHandler();

function ddd()
{
    alert('yes');
}