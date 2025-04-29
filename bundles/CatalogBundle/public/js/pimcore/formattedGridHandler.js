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

        let objectClassName = e.detail.object.data.general.className;
        let dataFields = e.detail.object.edit.dataFields;
		let objId = e.detail.object.id;
        if (objectClassName == 'CatalogTables' || objectClassName == 'SpecSheetCatalog') {
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

			   var URL = "/catalog/get-table-data";
			   if(objectClassName == 'SpecSheetCatalog'){
				   
				   URL = "/specsheet/get-table-data";
			   }

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
                      //  console.log('Update Table Button Clicked');
                        Ext.Ajax.request({
                            url: URL,
                            async: false,
                            params:{'objId' : e.detail.object.id, className : objectClassName},
                            success: function (response) {
                                response = Ext.decode(response.responseText);
								if(response.brandAndNomenClatureValueCheck == false){
									Ext.Msg.alert("Status","Please select at least one field value from either Brand or Nomenclature.");
									return false;
								}

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
                                let headerJson = [];
                                
                                var table = new Catalog.pimcore.object.tags.table([["1","1"],['2','2']],e.detail.object.edit.dataFields.ProductsData.fieldConfig);
                              //  table.getLayoutEdit();
                               // console.log(e.detail.object.edit.dataFields.ProductsData.component.id);
                                var comp = Ext.getCmp(e.detail.object.edit.dataFields.ProductsData.component.id);
                               // console.log(comp);
                                table.initStore(response.data,comp,e.detail.object.edit.dataFields.ProductsData,columns, objectClassName, e.detail.object.id);
                               // console.log(e.detail.object);
                                var headerComp = Ext.getCmp(e.detail.object.edit.dataFields.headerData.component.id);
                               
                                headerComp.setValue(response.headerData);
								if(objectClassName == 'SpecSheetCatalog'){
								
									 response.customRecords.forEach(function (item) {
										Ext.getCmp('CatalogDataGrid_'+e.detail.object.id).getSelectionModel().select(item,true,false);

									});			
								}
                                
                            }.bind(this)
                        });
                        
                    }.bind(this)
                });
				 panelContainingFormattedTable.insert(0, this.updateTableButton);
				if(objectClassName == 'SpecSheetCatalog'){
				
				  this.updateCustomSelectionButton = Ext.create('Ext.Button', {
                    text: 'Update Custom Products',
                    tooltip: 'Save Custom Products Selection',
                    style: {
                        'margin-bottom': '10px',
						'margin-left': '10px',
                    },
                    // scale:"medium",
                    iconCls: "plt_icon_plt_generate_button_icon",
                    cls: "plt_lightgrey_button",
					id: "customButton_"+e.detail.object.id,
                    handler: function () {
						
						
				    var selection = Ext.getCmp('CatalogDataGrid_'+e.detail.object.id).getSelection();
					
                    var fieldArray = new Array();
                    for(let i in selection){
						if(selection[i].data["SAP Number"]){
                          fieldArray.push(selection[i].data["SAP Number"]);
						} else if(selection[i].data["SAP #"]){
						  fieldArray.push(selection[i].data["SAP #"]);
						}
                    }
                   // if(selection.length){
                        var selectFertForExportListArr = JSON.parse("[" + fieldArray.join() + "]");
                        Ext.Ajax.request({
                            url : '/specsheet/addCustomSelection',
                            params : {
                                objectId: e.detail.object.id,
                                data: JSON.stringify(selectFertForExportListArr),
                            },
                            success : function(r){
                                //var res = Ext.decode(r.responseText);
                                
                            },
                        });
                   // }
                        
                    }.bind(this)
                });
				
				panelContainingFormattedTable.insert(1, this.updateCustomSelectionButton);
				
				}
                
            }.bind(this));
        }
    }.bind(this),


    
});

var formattedGridHandler = new pimcore.plugin.formattedGridHandler();

function ddd()
{
    alert('yes');
}