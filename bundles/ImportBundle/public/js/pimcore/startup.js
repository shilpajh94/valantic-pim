pimcore.registerNS("pimcore.plugin.ImportBundle");

pimcore.plugin.ImportBundle = Class.create({
    getClassName: function () {
        return "pimcore.plugin.ImportBundle";
    },

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
        document.addEventListener(pimcore.events.postSaveObject, this.postSaveObject.bind(this));
        document.addEventListener(pimcore.events.postOpenObject, this.postOpenObject.bind(this));
        // document.addEventListener(pimcore.events.preOpenObject, this.preOpenObject.bind(this));
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
    preOpenObject: function(e){
        setTimeout(function(){
            var tabPanel = e.detail.object.edit.layout.items.items[0].items.items[0].items.items[0];
            setTimeout(function(){tabPanel.setActiveTab(0);},200);
        },1000);
        
        

    },

    postOpenObject: function (e) {
        if (e.detail.object.data.general.className == 'Product') {
            var tabPanell = e.detail.object.edit.layout.items.items[0].items.items[0].items.items[0];
            var exportPanel = e.detail.object.edit.layout.items.items[0].items.items[0].items.items[0].items.items[3];
            this.createBrandNameStoreAndRender(e,exportPanel);
            
            if(tabPanell){
                tabPanell.on("tabchange", function (tabObject) {
                    let tabName = tabObject.activeTab.config.name.toLowerCase();
                    if (tabName == 'spec sheet export') {
                        if(Object.keys(e.detail.object.edit.dataFields).length === 0){
                            // console.log(typeof(object.edit.dataFields));    
                        }
                        else{  
                            this.createBrandNameStoreAndRender(e,tabObject);
                        }
                    }
                }.bind(this));
        
            }
        }
    },

    showGrid: function (tabObject, objectId, sapRange, brandName) {
        if( Ext.getCmp('dataGrid_'+objectId) != undefined){
            Ext.getCmp('dataGrid_'+objectId).removeAll();
            Ext.getCmp('dataGrid_'+objectId).remove();
        }
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
        // tabObject.activeTab.add(this.grid);
        tabObject.add(this.grid);
    },

    listAllFerts: function (tabObject, objectId) {
        if( Ext.getCmp('exportbtn') != undefined){
            console.log(Ext.getCmp('exportbtn'))
            Ext.getCmp('exportbtn').destroy();
        }
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
    //    tabObject.activeTab.add(btn);
    tabObject.add(btn);
    },
    createBrandNameStoreAndRender: function(e,tabObject){
        if (e.detail.object.data.general.className == 'Product') {
           var interval = setInterval(function(){
                if(e.detail.object.edit.dataFields.Columns != undefined){
                clearInterval(interval);
                    var colComp = Ext.getCmp(e.detail.object.edit.dataFields.Columns.component.id);
                    colComp.hide();
                let csheaderSelection = new pimcore.plugin.csheaderSelection();
                csheaderSelection.attachCSHeaders(e);
                }
            },200);
           



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
           var brandInterval= setInterval(function(){
            var importPlugin = this.ImportBundlePlugin

            if(e.detail.object.edit.dataFields.selectBrandName != undefined){
                clearInterval(brandInterval);
                e.detail.object.edit.dataFields.selectBrandName.component.setStore(productBrandStore);
                if (e.detail.object.data.data.selectBrandName !== null)
                {
                e.detail.object.edit.dataFields.selectBrandName.component.setValue(e.detail.object.data.data.selectBrandName);
                }
                productBrandStore.load();

            if (e.detail.object.edit.dataFields.selectBrandName.data !== null && e.detail.object.edit.dataFields.sapRange.data !== null) {
                if(e.detail.object.edit.dataFields.sapRange.data == 'CustomSelection'){
                    if(Ext.getCmp('exportbtn')){
                        Ext.getCmp('exportbtn').hide();
                    }
                    if( Ext.getCmp('dataGrid_'+objectId) == undefined){
                        importPlugin.showGrid(tabObject, e.detail.object.id, e.detail.object.edit.dataFields.sapRange.data, e.detail.object.edit.dataFields.selectBrandName.data.split(","));
                    }
                    
                    Ext.getCmp('dataGrid_'+objectId).hide(false);
                    Ext.getCmp('dataGrid_'+objectId).show();

                }else if(e.detail.object.edit.dataFields.sapRange.data == 'PrintedCatalog'){
                    if(Ext.getCmp('dataGrid_'+objectId)){
                        Ext.getCmp('dataGrid_'+objectId).hide();
                    }
                    if(Ext.getCmp('exportbtn')){
                        Ext.getCmp('exportbtn').hide();
                    }
                    importPlugin.listAllFerts(tabObject, e.detail.object.id);
                    Ext.getCmp('exportbtn').hide(false);
                    Ext.getCmp('exportbtn').show();
                }
                
                e.detail.object.edit.dataFields.sapRange.component.on('select', function (s){
                    if(e.detail.object.edit.dataFields.selectBrandName.data){
                        importPlugin.sapRangeData = s.getValue();
                        if(importPlugin.sapRangeData == 'CustomSelection'){
                            if( Ext.getCmp('dataGrid_'+objectId) == undefined){
                            importPlugin.showGrid(tabObject, e.detail.object.id, s.getValue(), e.detail.object.edit.dataFields.selectBrandName.data.split(",") );
                            }
                            Ext.getCmp('dataGrid_'+objectId).hide(false);
                            Ext.getCmp('dataGrid_'+objectId).show();
                            if(Ext.getCmp('exportbtn')){
                                Ext.getCmp('exportbtn').hide();
                            }
                        }else if(importPlugin.sapRangeData == 'PrintedCatalog'){
                            if(Ext.getCmp('exportbtn')){
                                Ext.getCmp('exportbtn').hide();
                            }
                            if(Ext.getCmp('dataGrid_'+objectId)){
                                Ext.getCmp('dataGrid_'+objectId).hide();
                            }
                            importPlugin.listAllFerts(tabObject, e.detail.object.id);
                        }
                    }
    
                }.bind(this));
            }


            e.detail.object.edit.dataFields.selectBrandName.component.on('select', function (event) {
                if(e.detail.object.edit.dataFields.sapRange.data == 'CustomSelection' && event.getValue()){
                    importPlugin.brandName = event.getValue();
                    if( Ext.getCmp('dataGrid_'+objectId) == undefined){
                    importPlugin.showGrid(tabObject, e.detail.object.id, e.detail.object.edit.dataFields.sapRange.data, event.getValue());
                    }
                }else if(e.detail.object.edit.dataFields.sapRange.data == 'PrintedCatalog'){
                    if(Ext.getCmp('exportbtn')){
                        Ext.getCmp('exportbtn').hide();
                    }
                    if(Ext.getCmp('dataGrid_'+objectId)){
                        Ext.getCmp('dataGrid_'+objectId).hide();
                    }
                    importPlugin.listAllFerts(tabObject, e.detail.object.id);
                }
            }.bind(this));

            e.detail.object.edit.dataFields.selectBrandName.component.on('select', function (event) {
                if(importPlugin.sapRangeData == 'CustomSelection' && event.getValue()){
                    importPlugin.brandName = event.getValue();
                    importPlugin.showGrid(tabObject, e.detail.object.id, importPlugin.sapRangeData, event.getValue());
                }else if(importPlugin.sapRangeData == 'PrintedCatalog'){
                    if(Ext.getCmp('exportbtn')){
                        Ext.getCmp('exportbtn').hide();
                    }
                    if(Ext.getCmp('dataGrid_'+objectId)){
                        Ext.getCmp('dataGrid_'+objectId).hide();
                    }
                    importPlugin.listAllFerts(tabObject, e.detail.object.id);
                }
                e.detail.object.edit.dataFields.sapRange.component.on('select', function (s){
                    importPlugin.sapRangeData = s.getValue();
                    if(importPlugin.sapRangeData == 'CustomSelection'){
                        importPlugin.showGrid(tabObject, e.detail.object.id, s.getValue(), event.getValue());
                        Ext.getCmp('dataGrid_'+objectId).hide(false);
                        Ext.getCmp('dataGrid_'+objectId).show();
                        if(Ext.getCmp('exportbtn')){
                            Ext.getCmp('exportbtn').hide();
                        }
                    }else if(importPlugin.sapRangeData == 'PrintedCatalog'){
                        if(Ext.getCmp('exportbtn')){
                            Ext.getCmp('exportbtn').hide();
                        }
                        if(Ext.getCmp('dataGrid_'+objectId)){
                            Ext.getCmp('dataGrid_'+objectId).hide();
                        }
                        importPlugin.listAllFerts(tabObject, e.detail.object.id);
                    }
                }.bind(this));
            }.bind(this));
            
            }
            

           },200,this);
           

           


        }
    }   
});

var ImportBundlePlugin = new pimcore.plugin.ImportBundle();