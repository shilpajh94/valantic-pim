pimcore.registerNS("pimcore.plugin.ImportBundle");

pimcore.plugin.ImportBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.ImportBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
        document.addEventListener(pimcore.events.postSaveObject, this.postSaveObject.bind(this));
        document.addEventListener(pimcore.events.postOpenObject, this.postOpenObject.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("ImportBundle ready!");
    },

    postSaveObject: function (e) {
        if (e.detail.object.data.general.className == "Product") {
            var tabPanel = e.detail.object.edit.layout.items.items[0].items.items[0].items.items[0];
            if(tabPanel.getActiveTab().title == "Spec Sheet Export"){
                tabPanel.setActiveTab(0);

                var colComp = Ext.getCmp(e.detail.object.edit.dataFields.Columns.component.id);
                colComp.hide();
    
                let csheaderSelection = new pimcore.plugin.csheaderSelection();
                csheaderSelection.attachCSHeaders(e);    
            }
            console.log(tabPanel.getActiveTab().title);
        }
    },

    postOpenObject: function (e) {
        if (e.detail.object.data.general.className == 'Product') {
            var tabPanell = e.detail.object.edit.layout.items.items[0].items.items[0].items.items[0];
            if(tabPanell){
                tabPanell.on("tabchange", function (tabObject) {
                    let tabName = tabObject.activeTab.config.name.toLowerCase();
                    if (tabName == 'spec sheet export') {
                        if(Object.keys(e.detail.object.edit.dataFields).length === 0){
                            // console.log(typeof(object.edit.dataFields));    
                        }
                        else{  
                            if (e.detail.object.data.general.className == 'Product') {
                                var colComp = Ext.getCmp(e.detail.object.edit.dataFields.Columns.component.id);
                                colComp.hide();
        
                                let csheaderSelection = new pimcore.plugin.csheaderSelection();
                                csheaderSelection.attachCSHeaders(e);
                    
                                var objectId = e.detail.object.id;
                                var productBrandStore = Ext.create('Ext.data.Store', {
                                    fields: ['key', 'value'],
                                    data: ['key', 'value'],
                                    proxy: {
                                        type: 'ajax',
                                        url: '/contitech_us_product/default/get_ferts_brand',
                                        method:'POST',
                                        extraParams: {
                                            objectId: objectId,
                                        },
                                        dataFields:id,
                                        valueFields:id,
                                        reader: {
                                            type: 'json',
                                            rootProperty: 'data'
                                        }
                                    },
                                });
                                
                                productBrandStore.load();
        
                                e.detail.object.edit.dataFields.selectBrandName.component.setStore(productBrandStore);
                                if (e.detail.object.data.data.selectBrandName !== null)
                                {
                                e.detail.object.edit.dataFields.selectBrandName.component.setValue(e.detail.object.data.data.selectBrandName);
                                setTimeout(function(){
                                    e.detail.object.edit.dataFields.selectBrandName.component.setValue(e.detail.object.data.data.selectBrandName);
                                },200);
                                }
                                productBrandStore.load();
        
                                if (e.detail.object.edit.dataFields.selectBrandName.data !== null && e.detail.object.edit.dataFields.sapRange.data !== null) {
                                    if(e.detail.object.edit.dataFields.sapRange.data == 'CustomSelection'){
                                        if(Ext.getCmp('exportbtn')){
                                            Ext.getCmp('exportbtn').hide();
                                        }
                                        this.showGrid(tabObject, e.detail.object.id, e.detail.object.edit.dataFields.sapRange.data, e.detail.object.edit.dataFields.selectBrandName.data.split(","));
                                        Ext.getCmp('dataGrid_'+objectId).hide(false);
                                        Ext.getCmp('dataGrid_'+objectId).show();
        
                                    }else if(e.detail.object.edit.dataFields.sapRange.data == 'PrintedCatalog'){
                                        if(Ext.getCmp('dataGrid_'+objectId)){
                                            Ext.getCmp('dataGrid_'+objectId).hide();
                                        }
                                        if(Ext.getCmp('exportbtn')){
                                            Ext.getCmp('exportbtn').hide();
                                        }
                                        this.listAllFerts(tabObject, e.detail.object.id);
                                        Ext.getCmp('exportbtn').hide(false);
                                        Ext.getCmp('exportbtn').show();
                                    }    
                                }
        
                                e.detail.object.edit.dataFields.sapRange.component.on('select', function (s){
                                    if(e.detail.object.edit.dataFields.selectBrandName.data){
                                        this.sapRangeData = s.getValue();
                                        if(this.sapRangeData == 'CustomSelection'){
                                            this.showGrid(tabObject, e.detail.object.id, s.getValue(), e.detail.object.edit.dataFields.selectBrandName.data.split(",") );
                                            Ext.getCmp('dataGrid_'+objectId).hide(false);
                                            Ext.getCmp('dataGrid_'+objectId).show();
                                            if(Ext.getCmp('exportbtn')){
                                                Ext.getCmp('exportbtn').hide();
                                            }
                                        }else if(this.sapRangeData == 'PrintedCatalog'){
                                            if(Ext.getCmp('exportbtn')){
                                                Ext.getCmp('exportbtn').hide();
                                            }
                                            if(Ext.getCmp('dataGrid_'+objectId)){
                                                Ext.getCmp('dataGrid_'+objectId).hide();
                                            }
                                            this.listAllFerts(tabObject, e.detail.object.id);
                                        }
                                    }
                
                                }.bind(this));
        
                                e.detail.object.edit.dataFields.selectBrandName.component.on('select', function (event) {
                                    if(e.detail.object.edit.dataFields.sapRange.data == 'CustomSelection' && event.getValue()){
                                        this.brandName = event.getValue();
                                        this.showGrid(tabObject, e.detail.object.id, e.detail.object.edit.dataFields.sapRange.data, event.getValue());
                                    }else if(e.detail.object.edit.dataFields.sapRange.data == 'PrintedCatalog'){
                                        if(Ext.getCmp('exportbtn')){
                                            Ext.getCmp('exportbtn').hide();
                                        }
                                        if(Ext.getCmp('dataGrid_'+objectId)){
                                            Ext.getCmp('dataGrid_'+objectId).hide();
                                        }
                                        this.listAllFerts(tabObject, e.detail.object.id);
                                    }
                                }.bind(this));
        
                                e.detail.object.edit.dataFields.selectBrandName.component.on('select', function (event) {
                                    if(this.sapRangeData == 'CustomSelection' && event.getValue()){
                                        this.brandName = event.getValue();
                                        this.showGrid(tabObject, e.detail.object.id, this.sapRangeData, event.getValue());
                                    }else if(this.sapRangeData == 'PrintedCatalog'){
                                        if(Ext.getCmp('exportbtn')){
                                            Ext.getCmp('exportbtn').hide();
                                        }
                                        if(Ext.getCmp('dataGrid_'+objectId)){
                                            Ext.getCmp('dataGrid_'+objectId).hide();
                                        }
                                        this.listAllFerts(tabObject, e.detail.object.id);
                                    }
                                    e.detail.object.edit.dataFields.sapRange.component.on('select', function (s){
                                        this.sapRangeData = s.getValue();
                                        if(this.sapRangeData == 'CustomSelection'){
                                            this.showGrid(tabObject, e.detail.object.id, s.getValue(), event.getValue());
                                            Ext.getCmp('dataGrid_'+objectId).hide(false);
                                            Ext.getCmp('dataGrid_'+objectId).show();
                                            if(Ext.getCmp('exportbtn')){
                                                Ext.getCmp('exportbtn').hide();
                                            }
                                        }else if(this.sapRangeData == 'PrintedCatalog'){
                                            if(Ext.getCmp('exportbtn')){
                                                Ext.getCmp('exportbtn').hide();
                                            }
                                            if(Ext.getCmp('dataGrid_'+objectId)){
                                                Ext.getCmp('dataGrid_'+objectId).hide();
                                            }
                                            this.listAllFerts(tabObject, e.detail.object.id);
                                        }
                                    }.bind(this));
                                }.bind(this));
                            }
                        }
                    }
                }.bind(this));
        
            }
        }
    },

    showGrid: function (tabObject, objectId, sapRange, brandName) {
        this.store = new Ext.data.JsonStore({
            proxy: {
                type: 'ajax',
                url: '/contitech_us_product/default/get_grid_ferts',
                method: 'POST',
                extraParams: {
                    objectId: objectId,
                    sapRange: sapRange,
                    brandName: JSON.stringify(brandName),
                },
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            fields: ["id", "articleNumber", "sapDescription", "SIOPLevel3", "SIOPLevel4", "published"],
        });
        this.store.load();

        this.grid = Ext.create('Ext.grid.Panel', {
            title: 'Data',
            store: this.store,
            id: 'dataGrid_'+objectId,            
            columns: [{
                text: 'Id',
                dataIndex: 'id',
                width: 100,
                filter: {
                    type: 'string'
                }
            }, 
            {
                text: 'Sap Number',
                dataIndex: 'articleNumber',
                width: 100,
                filter: {
                    type: 'string'
                }
            },
            {
                text: 'Sap Description',
                dataIndex: 'sapDescription',
                width: 275,
                filter: {
                    type: 'string'
                }
            },
            {
                text: 'SIOPLevel3',
                dataIndex: 'SIOPLevel3',
                width: 171,
                filter: {
                    type: 'string'
                }
            },
            {
                text: 'SIOPLevel4',
                dataIndex: 'SIOPLevel4',
                width: 200,
                filter: {
                    type: 'string'
                }
            },
            {
                text: 'Published',
                dataIndex: 'published',
                width: 120,
                filter: {
                    type: 'string'
                }
            },
            ],
            plugins: 'gridfilters',
            height: 350,
            width: 1000,
            renderTo: Ext.getBody(),
            selModel: {
                checkOnly: false,
                mode: 'SIMPLE'
            },
            selType: 'checkboxmodel',
            buttons: [{
                text: 'Select All',
                handler: function () {
                    Ext.getCmp('dataGrid_'+objectId).getSelectionModel().selectAll();
                }
            }, {
                text: 'Deselect All',
                handler: function () {
                    Ext.getCmp('dataGrid_'+objectId).getSelectionModel().deselectAll();
                }
            },{
                text:'Export Selected Record',
                handler:function(){
                    var selection = Ext.getCmp('dataGrid_'+objectId).getSelection();
                    var fieldArray = new Array();
                    for(let i in selection){
                        fieldArray.push((selection[i].data.articleNumber))
                    }
                    if(selection.length){
                        var selectFertForExportListArr = JSON.parse("[" + fieldArray.join() + "]");
                        var records = [];
                        var store  = Ext.create('Ext.data.Store',{
                            fields : ['articleNumber'],
                            data: records,
                            paging : false
                        });       
                        Ext.Ajax.request({
                            url : '/contitech_us_product/default/get_selected_ferts',
                            params : {
                                objectId: objectId,
                                articleNumber: JSON.stringify(selectFertForExportListArr),
                            },
                            success : function(r){
                                var res = Ext.decode(r.responseText);
                                var assetIdWithInvertedComma = res.data;
                                assetId = assetIdWithInvertedComma.replace(/['"]+/g, ''); 
                                if (assetId) {
                                    pimcore.helpers.download("/admin/asset/download?id=" +assetId);
                                }
                            },
                        });
                    }
                },
            },
        ],
        });
        tabObject.activeTab.add(this.grid);
    },

    listAllFerts: function (tabObject, objectId) {
        let btn = Ext.create('Ext.Button', {
            text: 'Export Data',
            tooltip: 'Spec Sheet Export',
            id: 'exportbtn',
            style : "margin-top :10px; margin-left : 635px; background-color: #555555; border: none; border-radius: 5px;",
            handler: function() {
                var records = [];
                var store  = Ext.create('Ext.data.Store',{
                    data: records,
                    paging : false
                }); 
                Ext.Ajax.request({
                    url : '/contitech_us_product/default/get_fert_for_export',
                    params : {
                        objectId: objectId,
                    },
                    success : function(r){
                        var res = Ext.decode(r.responseText);
                        var assetIdWithInvertedComma = res.data;
                        assetId = assetIdWithInvertedComma.replace(/['"]+/g, '');                    
                        if (assetId) {
                            pimcore.helpers.download("/admin/asset/download?id=" +assetId);
                        }
                    },
                });
            }
        });
       tabObject.activeTab.add(btn);
    },   
});

var ImportBundlePlugin = new pimcore.plugin.ImportBundle();