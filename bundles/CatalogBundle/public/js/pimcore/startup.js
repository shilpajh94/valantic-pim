pimcore.registerNS("pimcore.plugin.CatalogBundle");

pimcore.plugin.CatalogBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.CatalogBundle";
    },

    initialize: function () {
        // alert("pimcore.plugin.CatalogBundle: initialize");
        // pimcore.plugin.broker.registerPlugin(this);
        document.addEventListener(pimcore.events.postOpenObject, this.postOpenObject.bind(this));
        document.addEventListener(pimcore.events.postOpenDocument, this.postOpenDocument.bind(this));
    },

    postOpenObject: function (e) {
        let objectClassName = e.detail.object.data.general.className;
		let objId = e.detail.object.data.general.id;
        if (objectClassName == 'Catalog') {
            var SalesOrganisationCompObj = e.detail.object.edit.dataFields.SalesOrganisation.component;
            var DistributionChannelCompObj = e.detail.object.edit.dataFields.DistributionChannel.component;
            var IsPriceCatalogCompObj = e.detail.object.edit.dataFields.IsPriceCatalog.component;
            if(IsPriceCatalogCompObj.value == '1')
            {
                SalesOrganisationCompObj.show();
                SalesOrganisationCompObj.enable();
                DistributionChannelCompObj.show();
                DistributionChannelCompObj.enable();
            }
            else{
                SalesOrganisationCompObj.hide();
                SalesOrganisationCompObj.disable();
                DistributionChannelCompObj.hide();
                DistributionChannelCompObj.disable();
            }

            IsPriceCatalogCompObj.addListener('change', function (prVal, chVal) {
                
                if(chVal == '1')
                {
                    SalesOrganisationCompObj.show();
                    SalesOrganisationCompObj.enable();
                    DistributionChannelCompObj.show();
                    DistributionChannelCompObj.enable();
                }
                else{
                    SalesOrganisationCompObj.hide();
                    SalesOrganisationCompObj.disable();
                    DistributionChannelCompObj.hide();
                    DistributionChannelCompObj.disable();
                }

            });
        }

        if (objectClassName == 'CatalogCategory' || objectClassName == 'SpecSheetCatalog') {
			var catalogId = "";
			if(objectClassName == 'SpecSheetCatalog') {
				catalogId = e.detail.object.data.data.CatalogType;
				
			} else {
				catalogId = e.detail.object.data.general.parentId;
			}
			if(catalogId){
				var categoryOptionsStore = this.loadCategories(catalogId, objectClassName, e);
			}

           
        }
        //let helper = new pimcore.plugin.lpeHelper();

        if (objectClassName == 'CatalogPTS') {
            var baseOptionsStore = Ext.create('Ext.data.Store', {
                fields: ['key', 'value'],
                proxy: {
                    type: 'ajax',
                    url: '/catalog/get-base-products',
                    //  method:'POST',
                    extraParams: {
                        catId: e.detail.object.data.general.parentId,
                        objId: e.detail.object.data.general.id,

                    },
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                },

            });

            baseOptionsStore.load();

            e.detail.object.edit.dataFields.BaseProduct.component.setStore(baseOptionsStore);

            baseOptionsStore.load();
            if (e.detail.object.data.data.BaseProduct !== null)
            {
            console.log(e.detail.object.edit.dataFields.BaseProduct.component,e.detail.object.data.data.BaseProduct);
            setTimeout((component,componentValue)=>{

                component.setValue(componentValue);
            }, 1000,  e.detail.object.edit.dataFields.BaseProduct.component,e.detail.object.data.data.BaseProduct)
            }
            // e.detail.object.edit.dataFields.BaseProduct.component.on('blur', function (e) {

            //     var skeletonOptionsStore = Ext.create('Ext.data.Store', {
            //         fields: ['id', 'text'],
            //         proxy: {
            //             type: 'ajax',
            //             url: '/catalog/get-skeleton-products',
            //             //  method:'POST',
            //             extraParams: {
            //                 products: Ext.JSON.encode(e.value),

            //             },
            //             reader: {
            //                 type: 'json',
            //                 rootProperty: 'data'
            //             }
            //         },

            //     });

            //     skeletonOptionsStore.load();
            //     e.detail.object.edit.dataFields.SkeletonProduct.component.setStore(skeletonOptionsStore);
                
            //      if (e.detail.object.data.data.SkeletonProduct !== null)
            // {
            //     console.log(e.detail.object.data.data.SkeletonProduct);
            //     e.detail.object.edit.dataFields.SkeletonProduct.component.setValue(e.detail.object.data.data.SkeletonProduct);
            // }
            // skeletonOptionsStore.load();
            // });
        } // end CatalogPTS
		

        if (objectClassName == 'CatalogTables' || objectClassName == 'SpecSheetCatalog') {

            var colComp = Ext.getCmp(e.detail.object.edit.dataFields.Columns.component.id);
            colComp.hide();
            
            var store;
            var columns;
            var data;
			
			var tableOptionsStore;
			if(objectClassName == 'SpecSheetCatalog'){
				var catalogTypevalue = e.detail.object.data.data.CatalogType;
				var CatalogType = e.detail.object.edit.dataFields.CatalogType.component;
				 CatalogType.addListener('change', function (prVal, chVal) {
					
					this.loadCategories(chVal, objectClassName, e);
					tableOptionsStore = this.loadAttributeTables(chVal, objectClassName, e);
					

				}.bind(this));
				
				if(catalogTypevalue){
					catvalue = e.detail.object.data.data.CatalogType;
				   tableOptionsStore = this.loadAttributeTables(catalogTypevalue, objectClassName, e);
				}
			} else {
				tableOptionsStore = this.loadAttributeTables(e.detail.object.data.general.parentId, objectClassName, e);
			}

          
            let template = null;
             e.detail.object.edit.dataFields.Template.component.on('change', function(eve){
                
               template = eve.value;
             });

            if((e.detail.object.data.data.AttributeTable !== null && trim(e.detail.object.data.data.AttributeTable) !== "")){
                var headerSelection = new pimcore.plugin.headerSelection();
                headerSelection.attachHeader(e.detail.object, {'value': e.detail.object.data.data.AttributeTable},template);
            }

             e.detail.object.edit.dataFields.AttributeTable.component.on('select', function(event){
              //   if(e.detail.object.data.data.AttributeTable != event.value)
                {
                    var headerSelection = new pimcore.plugin.headerSelection();
                    headerSelection.attachHeader(e.detail.object, event,template);
                }
             });
             
		if (objectClassName == 'CatalogTables'){
            var baseOptionsStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'text'],
                proxy: {
                    type: 'ajax',
                    url: '/catalog/get-base-products',
                    //  method:'POST',
                    extraParams: {
                        catId: e.detail.object.data.general.parentId,
                        objId: e.detail.object.data.general.id,

                    },
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                },

            });

            baseOptionsStore.load();

            e.detail.object.edit.dataFields.BaseProduct.component.setStore(baseOptionsStore);

            if (e.detail.object.data.data.BaseProduct !== null)
            {
               // console.log(e.detail.object.data.data.BaseProduct);
                e.detail.object.edit.dataFields.BaseProduct.component.setValue(e.detail.object.data.data.BaseProduct);
            }
            baseOptionsStore.load();

            e.detail.object.edit.dataFields.BaseProduct.component.on('blur', function (e) {

                var skeletonOptionsStore = Ext.create('Ext.data.Store', {
                    fields: ['id', 'text'],
                    proxy: {
                        type: 'ajax',
                        url: '/catalog/get-skeleton-products',
                        //  method:'POST',
                        extraParams: {
                            products: Ext.JSON.encode(e.value),

                        },
                        reader: {
                            type: 'json',
                            rootProperty: 'data'
                        }
                    },

                });

                skeletonOptionsStore.load();
                e.detail.object.edit.dataFields.SkeletonProduct.component.setStore(skeletonOptionsStore);
                
                 if (e.detail.object.data.data.SkeletonProduct !== null)
            {
                console.log(e.detail.object.data.data.SkeletonProduct);
                e.detail.object.edit.dataFields.SkeletonProduct.component.setValue(e.detail.object.data.data.SkeletonProduct);
            }
            skeletonOptionsStore.load();
            });
            
            
               var siopStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'text'],
                
                proxy: {
                    type: 'ajax',
                    url: '/catalog/get-siop-data',
                    //  method:'POST',
                    extraParams: {
                        catId: e.detail.object.data.general.parentId,

                    },
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                },

            });

            siopStore.load();
            e.detail.object.edit.dataFields.SIOPLevel4.component.setStore(siopStore);
             
           siopStore.on('load', function(store, records, successful){
   if(store.getCount() == 0)
            {
                e.detail.object.edit.dataFields.SIOPLevel4.component.setDisabled(true);
            }
});
           
            if (e.detail.object.data.data.SIOPLevel4 !== null)
            {
               // console.log(e.detail.object.data.data.BaseProduct);
                e.detail.object.edit.dataFields.SIOPLevel4.component.setValue(e.detail.object.data.data.SIOPLevel4);
            }
		}
            
            var tabs = Ext.getCmp(e.detail.object.edit.layout.items.items[0].id);

            tabs.on('tabChange', function (obj, newTab, oldTab) {
                if (newTab.name == 'Data')
                {
                    var headComp = Ext.getCmp(e.detail.object.edit.dataFields.headerData.component.id);
                    headComp.hide();
                    Ext.Ajax.request({
                        url: "/catalog/get-initial-data",
                        method: 'GET',
                        async: false,
                        params: {'objId': e.detail.object.id, 'className': objectClassName},
                        success: function (response) {
                            response = Ext.decode(response.responseText);

                            store = Ext.create('Ext.data.Store', {
                                fields: response.fieldData,
                                data: {'items': response.data},
                                //   data    : {'items':[["1","1"],['2','2']]},

                                proxy: {
                                    type: 'memory',
                                    reader: {
                                        //  xtype: 'grid',
                                        type: 'json',
                                        rootProperty: 'items'
                                    }
                                },
                                header: true
                            });
                            columns = response.columnData;
                            data = response.data; 



                            var table = new Catalog.pimcore.object.tags.table([], e.detail.object.edit.dataFields.ProductsData.fieldConfig);
                            var comp = Ext.getCmp(e.detail.object.edit.dataFields.ProductsData.component.id);

                            table.initStore(data, comp, e.detail.object.edit.dataFields.ProductsData, columns, objectClassName, objId);
						
						 if(objectClassName == 'SpecSheetCatalog'){
							 let SAPRange = e.detail.object.edit.dataFields.SAPRange.data; 
							 //if(SAPRange == "Custom Selection"){
							 response.customRecords.forEach(function (item) {
								 Ext.getCmp('CatalogDataGrid_'+objId).getSelectionModel().select(item,true,false);

							});
							//}
						 }
						}
                    });
                }
            });
            let formatterGridHandler = new pimcore.plugin.formattedGridHandler();
            formatterGridHandler.setUpFormattedGrid(e);


        }
    },
    postOpenDocument: function(e){

        let template = e.detail.document.data.template;

        if (template == 'catalog/default/template_hydraulic_alphanumeric_index_by_descriptive_number_dynamic.html.twig') {
            let resetTableOfContent = new pimcore.plugin.contitech.resetTableOfContent(e.detail.document);
            resetTableOfContent.addResetContentButton();
        }
        else if (template == 'catalog/default/template_hydraulic_alphanumeric_index_by_product_number_dynamic.html.twig') {
            let resetTableOfContent = new pimcore.plugin.contitech.resetTableOfContent(e.detail.document);
            resetTableOfContent.addResetContentButton();
        }
        else if (template == 'catalog/default/template_hydraulic_table_of_contents_dynamic.html.twig') {
            let resetTableOfContent = new pimcore.plugin.contitech.resetTableOfContent(e.detail.document);
            resetTableOfContent.addResetContentButton();
        }
        else if (template == 'catalog/inh/template_industrial_hose_index_by_application_dynamic.html.twig') {
            let resetTableOfContent = new pimcore.plugin.contitech.resetTableOfContent(e.detail.document);
            resetTableOfContent.addResetContentButton();
        }
        else if (template == 'catalog/inh/template_industrial_hose_index_by_alphabet_dynamic.html.twig') {
            let resetTableOfContent = new pimcore.plugin.contitech.resetTableOfContent(e.detail.document);
            resetTableOfContent.addResetContentButton();
        }
        else if (template == 'catalog/inh/template_industrial_hose_table_of_contents_dynamic.html.twig') {
            let resetTableOfContent = new pimcore.plugin.contitech.resetTableOfContent(e.detail.document);
            resetTableOfContent.addResetContentButton();
        }
    },

	loadCategories: function (catalogId, className, e) {
	  var categoryOptionsStore = Ext.create('Ext.data.Store', {
                fields: ['id', 'text'],
                proxy: {
                    type: 'ajax',
                    url: '/catalog/get-category',
                    //  method:'POST',
                    extraParams: {
                        catId: catalogId,
						className: className

                    },
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                },

            });
			categoryOptionsStore;
			
			 categoryOptionsStore.load();

            e.detail.object.edit.dataFields.Category.component.setStore(categoryOptionsStore);
            if (e.detail.object.data.data.Category !== null)
            {
                e.detail.object.edit.dataFields.Category.component.setValue(e.detail.object.data.data.Category);
            }
           // categoryOptionsStore.load();
	},
	
	loadAttributeTables: function (value, className, e) {
	 var tableOptionsStore = Ext.create('Ext.data.Store', {
                fields: ['key', 'value'],
                proxy: {
                    type: 'ajax',
                    url: '/catalog/get-tables',
                    // autoLoad: true,
                    //  method:'POST',
                    extraParams: {
                        catId: value,
						className: className

                    },
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                },

            });
			
			tableOptionsStore.load();
            e.detail.object.edit.dataFields.AttributeTable.component.setStore(tableOptionsStore);
            if (e.detail.object.data.data.AttributeTable !== null)
            {
                tableOptionsStore.on('load', function(store, records, successful){
                    e.detail.object.edit.dataFields.AttributeTable.component.setValue(e.detail.object.data.data.AttributeTable);
                 });
                // object.edit.dataFields.AttributeTable.component.setValue(object.data.data.AttributeTable);
            }
	}

});

var CatalogBundlePlugin = new pimcore.plugin.CatalogBundle();
Ext.define('Catalog.pimcore.object.tags.table', {
    extend: 'pimcore.object.tags.table',
    initStore: function (data, comp, field, columnArr, objectClassName, objId) {
        if(data !== null)
        {
        this.component = comp;
        var storeFields = [];
        if (data[0]) {
            for (var i = 0; i < data[0].length; i++) {
                storeFields.push({
                    name: columnArr[i].name
                });
            }
        }

        this.store = new Ext.data.ArrayStore({
            fields: storeFields
        });

        this.store.loadData(data);
        field.data = data;
        field.dirty = true;
        field.store = this.store;
        this.initGrid(comp, columnArr, objectClassName, objId);
    }
    },
	

    initGrid: function (comp, columnArr, objectClassName, objId) {
        this.component = comp;
        this.component.removeAll();

        var data = this.store.queryBy(function (record, id) {
            return true;
        });

        var columns = [];

        var fields = this.store.getInitialConfig().fields;

        /*if (data.items[0]) {
         for (var i = 0; i < fields.length; i++) {
         columns.push({
         text: this.fieldConfig.columnConfigActivated && this.fieldConfig.columnConfig[i] ? ts(this.fieldConfig.columnConfig[i].label) : '',
         dataIndex: fields[i].name,
         editor: new Ext.form.TextField(),
         sortable: false,
         flex: 1
         
         
         });
         }
         }*/
        columns = columnArr;
        this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {});

        var tbar = [];
        /* if (!this.fieldConfig.colsFixed || columns.length < this.fieldConfig.cols) {
         tbar.push({
         iconCls: "pimcore_icon_table_col pimcore_icon_overlay_add",
         handler: this.addColumn.bind(this)
         });
         }
         
         if (!this.fieldConfig.colsFixed || columns.length > this.fieldConfig.cols) {
         tbar.push({
         iconCls: "pimcore_icon_table_col pimcore_icon_overlay_delete",
         handler: this.deleteColumn.bind(this)
         });
         }
         
         if (!this.fieldConfig.rowsFixed || data.length != this.fieldConfig.rows) {
         tbar.push({
         iconCls: "pimcore_icon_table_row pimcore_icon_overlay_delete",
         handler: this.deleteRow.bind(this)
         });
         
         tbar.push({
         iconCls: "pimcore_icon_table_row pimcore_icon_overlay_add",
         handler: this.addRow.bind(this)
         });
         }
         
         tbar.push({
         iconCls: "pimcore_icon_paste",
         handler: this.pasteFromClipboard.bind(this)
         });
         tbar.push({
         iconCls: "pimcore_icon_empty",
         handler: this.emptyStore.bind(this)
         });
         */
        // customization -- starts
		var selType = "";
		var selModel = Ext.create('Ext.selection.CellModel');
		var plugins = '';
		var gridId = 'CatalogDataGrid_'+objId;
		if(objectClassName == "SpecSheetCatalog"){
				selType = 'checkboxmodel';
				plugins = 'gridfilters';
				selModel =  {
                checkOnly: false,
                mode: 'SIMPLE',
				name:'checkit'
                }
		} 

        if (this.fieldConfig.name == "ProductsData") {
            this.grid = Ext.create('Ext.grid.Panel', {
                store: this.store,
				id:gridId,
                columns: columns,
                stripeRows: true,
                columnLines: true,
				selType: selType,
				selModel: selModel,
                bodyCls: "pimcore_editable_grid",
                autoHeight: true,
                hideHeaders: false,
                enableColumnHide: false,
                plugins: plugins,
                tbar: tbar,
                viewConfig: {
                    forceFit: true
                }
            });

            this.grid.on("reconfigure", function (scope, newStore, newColumns, oldStore, oldColumns, eOpts) {
                this.dirty = true;
                this.store = newStore;
            }.bind(this));

        } else {
            this.grid = Ext.create('Ext.grid.Panel', {
                store: this.store,
                columns: columns,
                stripeRows: true,
                columnLines: true,
			    selType: "",
				selModel: Ext.create('Ext.selection.CellModel'),
                bodyCls: "pimcore_editable_grid",
                autoHeight: true,
                hideHeaders: false,
                enableColumnHide: false,
                plugins: [
                    this.cellEditing
                ],
                tbar: tbar,
                viewConfig: {
                    forceFit: true
                }
            });
        }
        // customization -- ends

        // default pimcore implementation -- starts
        // this.grid = Ext.create('Ext.grid.Panel', {
        //     store: this.store,
        //     columns: columns,
        //     stripeRows: true,
        //     columnLines: true,
        //     bodyCls: "pimcore_editable_grid",
        //     autoHeight: true,
        //     selModel: Ext.create('Ext.selection.CellModel'),
        //     hideHeaders: true,
        //     plugins: [
        //         this.cellEditing
        //     ],
        //     tbar: tbar,
        //     viewConfig: {
        //         forceFit: true
        //     }
        // });
        // default pimcore implementation -- ends

		
				

        this.component.add(this.grid);
        this.component.updateLayout();
    }

});